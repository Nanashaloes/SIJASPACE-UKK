<div class="p-5 space-y-5 bg-gradient-to-b from-blue-300 to-blue-400 rounded-xl shadow-md text-white">
    <div class="border border-blue-700 rounded-xl p-0 bg-white shadow-inner overflow-hidden">
        <div class="siswa-container h-[calc(100vh-200px)] flex flex-col">
            {{-- Header --}}
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-700 to-blue-600 text-white">
                {{-- Tombol Tambah Industri - Hanya untuk siswa dan super_admin --}}
                @if(auth()->user()->hasRole(['Siswa', 'super_admin']))
                    <a href="{{ route('industri.create') }}"
                    class="bg-white hover:bg-blue-50 text-blue-700 font-medium px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Industri
                    </a>
                @else
                    {{-- Placeholder kosong untuk menjaga layout --}}
                    <div></div>
                @endif

                <h2 class="text-xl font-bold">
                    Daftar Industri
                </h2>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input wire:model.live="search"
                        type="text"
                        placeholder="Cari industri..."
                        class="pl-10 pr-4 py-2 w-60 rounded-lg bg-blue-800/30 border border-blue-500 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50"/>
                </div>
            </div>

            {{-- Notifikasi --}}
            @if (session()->has('message'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition
                    class="bg-blue-50 text-blue-700 px-6 py-3 rounded-md border-l-4 border-blue-500 flex items-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            {{-- Tabel --}}
            <div class="overflow-auto flex-1 rounded-xl border border-gray-200 shadow-sm">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gradient-to-r from-blue-700 to-blue-600 text-white text-xs uppercase sticky top-0 z-10">
                        <tr>
                            <th class="px-4 py-3 w-35 truncate text-left font-medium">Nama</th>
                            <th class="px-4 py-3 w-35 truncate text-left font-medium">Bidang</th>
                            <th class="px-4 py-3 w-35 truncate text-left font-medium">Alamat</th>
                            <th class="px-4 py-3 w-35 truncate text-left font-medium">Kontak</th>
                            <th class="px-4 py-3 w-30 truncate text-left font-medium">Guru</th>
                            <th class="px-4 py-3 w-20 text-center font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($industriList as $industri)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="px-4 py-3 max-w-[8rem] truncate">{{ \Illuminate\Support\Str::words($industri->nama, 2, '...') }}</td>
                                <td class="px-4 py-3 max-w-[8rem] truncate">{{ \Illuminate\Support\Str::words($industri->bidang_usaha, 2, '...') }}</td>
                                <td class="px-4 py-3 max-w-[10rem] truncate">{{ \Illuminate\Support\Str::words($industri->alamat, 2, '...') }}</td>
                                <td class="px-4 py-3 max-w-[8rem] truncate">{{ \Illuminate\Support\Str::words($industri->kontak, 2, '...') }}</td>
                                <td class="px-4 py-3 max-w-[10rem] truncate">{{ \Illuminate\Support\Str::words($industri->guru->nama ?? 'Guru Tidak Ditemukan', 2, '...') }}</td>
                                <td class="px-4 py-3 text-center">
                                    {{-- Role Guru - Hanya tombol Lihat --}}
                                    @if(auth()->user()->hasRole('Guru'))
                                        <a href="{{ route('industri.show', ['id' => $industri->id]) }}"
                                        class="inline-flex items-center bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat
                                        </a>
                                    {{-- Role Siswa dan Super Admin - Semua tombol --}}
                                    @elseif(auth()->user()->hasRole(['Siswa', 'super_admin']))
                                        <div x-data="{ open: false }" class="relative inline-block">
                                            <button @click="open = !open"
                                                    class="bg-gray-100 hover:bg-gray-200 p-1.5 rounded-lg text-gray-600 hover:text-blue-700 focus:outline-none transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01"/>
                                                </svg>
                                            </button>
                                            <div x-show="open" x-transition @click.away="open = false"
                                                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                                <a href="{{ route('industri.show', ['id' => $industri->id]) }}"
                                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                    Lihat
                                                </a>

                                                {{-- Tombol Edit - Hanya untuk siswa dan super_admin --}}
                                                <a href="{{ route('industri.edit', ['id' => $industri->id]) }}"
                                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>

                                                {{-- Tombol Hapus - Hanya untuk super_admin --}}
                                                @if(auth()->user()->hasRole(['Siswa', 'super_admin']))
                                                    <button
                                                        @click.prevent="
                                                            if (confirm('Yakin ingin menghapus data industri ini?')) {
                                                                $wire.delete({{ $industri->id }});
                                                                open = false;
                                                            }
                                                        "
                                                        class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4"/>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center px-6 py-10 text-gray-500 bg-gray-50">
                                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-base">Tidak ada data ditemukan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex justify-between items-center px-6 py-3 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center gap-2">
                    <label for="perPage" class="text-sm text-gray-600">Tampilkan:</label>
                    <select wire:model="numpage" wire:change="updatePageSize($event.target.value)"
                            class="bg-white border border-gray-300 text-gray-700 rounded-md px-3 py-1 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="{{ $industriList->total() }}">Semua</option> {{-- EDITED HERE --}}
                    </select>

                    <span class="text-sm text-gray-600">data per halaman</span>
                </div>
                @if ($numpage !== 'all')
                    <div>
                        {{ $industriList->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
