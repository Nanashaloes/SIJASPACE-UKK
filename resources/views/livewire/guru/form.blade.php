<div class="p-6 max-w-3xl mx-auto bg-white shadow-md rounded-lg text-sm">
    <!-- Judul form: dinamis tampilkan 'Edit Guru' jika ada id, atau 'Tambah Guru' jika tidak -->
    <h2 class="text-xl font-semibold mb-4 text-center text-blue-700">
        {{ $id ? 'Edit Guru' : 'Tambah Guru' }}
    </h2>

    <!-- Form Livewire untuk submit data guru, method 'save' akan dipanggil saat submit -->
    <form wire:submit.prevent="save" class="space-y-4">

        <!-- Blok input foto guru -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Foto Guru</label>

            <!-- Tampilkan preview foto lama jika ada dan bukan file upload baru -->
            @if ($foto && !is_object($foto))
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $foto) }}" alt="Foto Guru"
                        class="w-32 h-32 object-cover rounded-full border border-gray-300 shadow">
                </div>
            <!-- Tampilkan preview foto baru jika user upload file baru (temporary file) -->
            @elseif (is_object($foto))
                <div class="mb-3">
                    <img src="{{ $foto->temporaryUrl() }}" alt="Preview Foto Baru"
                        class="w-32 h-32 object-cover rounded-full border border-gray-300 shadow">
                </div>
            @endif

            <!-- Input file untuk upload foto baru, model binding dengan Livewire property 'foto' -->
            <input type="file" wire:model="foto"
                class="w-full text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-white file:bg-blue-600 hover:file:bg-blue-700" />
            <!-- Error validation untuk foto -->
            @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
        </div>

        <!-- Blok input nama guru -->
        <div>
            <label class="block text-gray-700 mb-1">Nama</label>
            <input type="text" wire:model="nama"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:outline-none text-gray-800" />
            <!-- Error validation untuk nama -->
            @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok input NIP guru -->
        <div>
            <label class="block text-gray-700 mb-1">NIP</label>
            <input type="text" wire:model="nip"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:outline-none text-gray-800" />
            <!-- Error validation untuk NIP -->
            @error('nip') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok input gender guru dengan radio button -->
        <div>
            <label class="block text-gray-700 mb-1">Gender</label>
            <div class="flex gap-6 mt-1">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="gender" value="L" class="form-radio text-blue-600" />
                    <span class="ml-2 text-gray-700 text-sm">Laki Laki</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="gender" value="P" class="form-radio text-blue-600" />
                    <span class="ml-2 text-gray-700 text-sm">Perempuan</span>
                </label>
            </div>
            <!-- Error validation untuk gender -->
            @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok input alamat guru -->
        <div>
            <label class="block text-gray-700 mb-1">Alamat</label>
            <textarea wire:model="alamat" rows="2"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:outline-none text-gray-800"></textarea>
            <!-- Error validation untuk alamat -->
            @error('alamat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok input kontak guru -->
        <div>
            <label class="block text-gray-700 mb-1">Kontak</label>
            <input type="text" wire:model="kontak"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:outline-none text-gray-800" />
            <!-- Error validation untuk kontak -->
            @error('kontak') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok input email guru -->
        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" wire:model="email"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:outline-none text-gray-800" />
            <!-- Error validation untuk email -->
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Blok tombol aksi: batal dan simpan -->
        <div class="flex justify-end space-x-3 pt-4">
            <!-- Tombol batal, mengarahkan kembali ke halaman daftar guru -->
            <a href="{{ route('guru') }}"
                class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm focus:outline-none focus:ring-2 focus:ring-gray-500">
                Batal
            </a>

            <!-- Tombol simpan untuk submit form -->
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
        </div>
    </form>
</div>
