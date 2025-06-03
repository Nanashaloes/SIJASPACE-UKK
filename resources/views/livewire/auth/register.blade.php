<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <div class="flex flex-col gap-2 mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h2>
        <p class="text-sm text-gray-500">Isi detail di bawah untuk mendaftar akun Anda</p>
    </div>

    <!-- Status Sesi -->
    <x-auth-session-status class="text-center mb-4 text-green-600" :status="session('status')" />

 <!-- Form -->
    <form wire:submit="register" class="relative z-10 flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="('Full name')"
            class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />

        <!-- Email -->
        <flux:input
            wire:model="email"
            :label="('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
            class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="('Password')"
            viewable
            class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="('Confirm password')"
            viewable
            class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />

        <!-- Pemilihan Peran (Opsional, bisa aktifkan kalau mau) -->
        <!--
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Tipe Akun</label>
            <select wire:model="role" required class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="">-- Pilih Peran --</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
            </select>
        </div>
        -->

        <div class="mt-4">
            <flux:button
                type="submit"
                variant="primary"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg py-2 transition"
            >
                Daftar Sekarang
            </flux:button>
        </div>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600">
        Sudah punya akun?
        <flux:link
            :href="route('login')"
            wire:navigate
            class="text-blue-600 hover:text-blue-800 font-semibold"
        >
            Masuk di sini
        </flux:link>
    </div>
</div>
<!-- TITLE -->
<script>
    document.title = 'Daftar akun';
</script>