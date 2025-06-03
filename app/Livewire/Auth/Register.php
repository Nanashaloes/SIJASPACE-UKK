<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Validasi input
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Cek apakah email siswa sudah terdaftar
        $siswa = Siswa::where('email', $validated['email'])->first();

        if (!$siswa) {
            // Pakai addError supaya Livewire langsung tahu ada error di field 'email' dan ditampilkan di UI
            $this->addError('email', 'Email Anda belum terdaftar sebagai siswa. Silakan hubungi admin.');
            return; // hentikan proses registrasi
        }

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Buat user baru
        $user = User::create($validated);

        // Event pendaftaran & login
        event(new Registered($user));
        Auth::login($user);

        // Redirect ke dashboard
        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}