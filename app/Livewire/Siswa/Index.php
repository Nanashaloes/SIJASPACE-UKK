<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        session()->flash('message', 'Data siswa berhasil dihapus.');
    }

    public function render()
    {
        $user = Auth::user();
        $query = Siswa::query();

        // Jika user adalah siswa, hanya tampilkan datanya sendiri
        if ($user->hasRole('Siswa')) {
            $query->where('email', $user->email);
        }

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nis', 'like', '%' . $this->search . '%');
            });
        }

        $query->orderBy('nama', 'asc');

        $this->siswaList = $query->paginate($this->numpage);

        return view('livewire.siswa.index', [
            'siswaList' => $this->siswaList,
        ]);
    }

    public function updatePageSize($size)
    {
        $this->numpage = $size;
    }

    public function ketGender($gender)
    {
        return $gender === 'L' ? 'Laki-laki' : ($gender === 'P' ? 'Perempuan' : 'Status tidak diketahui');
    }

    public function ketStatusPKL($status)
    {
        return $status === 0 ? 'Belum diterima PKL' : ($status === 1 ? 'Sudah diterima PKL' : 'Status tidak diketahui');
    }
}
