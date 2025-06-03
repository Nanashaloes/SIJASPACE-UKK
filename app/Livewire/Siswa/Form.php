<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $id, $nama, $nis, $gender, $alamat, $kontak, $email, $foto, $existingFoto, $status_pkl;

    public function mount($id = null)
    {
        if ($id) {
            $siswa = Siswa::findOrFail($id);
            $this->id = $siswa->id;
            $this->nama = $siswa->nama;
            $this->nis = $siswa->nis;
            $this->gender = $siswa->gender;
            $this->alamat = $siswa->alamat;
            $this->kontak = $siswa->kontak;
            $this->email = $siswa->email;
            $this->existingFoto = $siswa->foto;
            $this->status_pkl = $siswa->status_pkl;
        }
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string',
            'nis' => 'required|string',
            'gender' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email',
            'foto' => $this->id ? 'nullable|image|max:1024' : 'required|image|max:1024',
            'status_pkl' => 'required|boolean',
        ]);

        // Format nomor kontak ke +62
        $this->kontak = $this->formatNomor($this->kontak);

        $fotoPath = null;
        if ($this->foto) {
            $fotoPath = $this->foto->store('foto_siswa', 'public');
        } elseif ($this->existingFoto ?? false) {
            $fotoPath = $this->existingFoto;
        }

        Siswa::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'nis' => $this->nis,
                'gender' => $this->gender,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'foto' => $fotoPath,
                'status_pkl' => $this->status_pkl ? 1 : 0,
            ]
        );

        session()->flash('message', 'Data siswa berhasil disimpan.');
        return redirect()->route('siswa');
    }

    private function formatNomor($nomor)
    {
        $nomor = preg_replace('/[^0-9]/', '', $nomor); // Hanya angka
        if (str_starts_with($nomor, '0')) {
            return '+62' . substr($nomor, 1);
        }
        return $nomor;
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}
