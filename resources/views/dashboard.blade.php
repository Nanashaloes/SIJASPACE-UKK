<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6 p-6 bg-white text-gray-800">

        <!-- Pengenalan Aplikasi -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl shadow-sm border border-blue-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full -mr-16 -mt-16 opacity-30"></div>
            <div class="absolute bottom-0 left-0 w-20 h-20 bg-indigo-100 rounded-full -ml-10 -mb-10 opacity-40"></div>
            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-center text-blue-600 mb-2">Selamat datang di SijaSpace</h2>
                <p class="mt-3 text-gray-600 max-w-3xl mx-auto text-center leading-relaxed">
                    Platform ini membantu Anda dalam mengelola data siswa SIJA secara efisien, mulai dari informasi pribadi hingga pengawasan kegiatan PKL.
                </p>
                <div class="flex justify-center mt-4">
                    <div class="flex items-center space-x-2 text-sm text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Last updated: {{ now()->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Sederhana -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 rounded-full -mr-8 -mt-8 group-hover:bg-blue-100 transition-colors"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Jumlah Siswa</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-blue-600">{{ $jumlahSiswa }}</p>
                    <p class="text-xs text-gray-400 mt-1">Total terdaftar</p>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-green-50 rounded-full -mr-8 -mt-8 group-hover:bg-green-100 transition-colors"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Siswa Aktif PKL</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-green-600">{{ $siswaAktifPkl }}</p>
                    <p class="text-xs text-gray-400 mt-1">Sedang melaksanakan</p>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-purple-50 rounded-full -mr-8 -mt-8 group-hover:bg-purple-100 transition-colors"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Industri Terdaftar</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-purple-600">{{ $industriTerdaftar }}</p>
                    <p class="text-xs text-gray-400 mt-1">Mitra kerjasama</p>
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Aktivitas Terbaru
                </h3>
                <a href="#" class="text-sm text-blue-500 hover:text-blue-700 font-medium flex items-center">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            @if(count($aktivitas) > 0)
                <ul class="space-y-3">
                    @foreach(array_slice($aktivitas, 0, 3) as $index => $item)
                        <li class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-lg border border-blue-100 hover:from-blue-100 hover:to-indigo-100 transition-all duration-200 transform hover:scale-[1.01]">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800 text-sm">{{ $item['nama'] }}</p>
                                            <p class="text-gray-600 text-sm mt-1">{{ $item['kegiatan'] }}</p>
                                        </div>
                                        <div class="flex items-center text-gray-400 mt-2 md:mt-0 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d M Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <p class="text-gray-400">Belum ada aktivitas terbaru</p>
                </div>
            @endif
        </div>

        <!-- Quick Actions & System Info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
<!-- Quick Actions -->
<div class="bg-white p-6 rounded-xl shadow border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        Aksi Cepat
    </h3>

            <!-- Grid 2x2 -->
            <div class="grid grid-cols-2 gap-4">
                    <!-- Tambah Siswa -->
                    @if(auth()->user()->hasRole('super_admin'))
                        <a href="{{ route('siswa.create') }}" class="p-4 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-lg border border-blue-200 transition group">
                            <div class="flex flex-col items-center text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mb-2 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Tambah Siswa</span>
                            </div>
                        </a>
                    @else
                        <div class="relative group">
                            <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg border border-gray-300 cursor-not-allowed opacity-60">
                                <div class="flex flex-col items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    <span class="text-sm font-medium text-gray-500">Tambah Siswa</span>
                                </div>
                            </div>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-gray-800 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                                <div class="text-center">
                                    <div class="font-medium">Akses Terbatas</div>
                                    <div class="text-gray-300">Hanya Super Admin</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Tambah Industri -->
                    @if(auth()->user()->hasRole(['Siswa', 'super_admin']))
                        <a href="{{ route('industri.create') }}" class="p-4 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-lg border border-green-200 transition group">
                            <div class="flex flex-col items-center text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mb-2 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Tambah Industri</span>
                            </div>
                        </a>
                    @else
                        <div class="relative group">
                            <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg border border-gray-300 cursor-not-allowed opacity-60">
                                <div class="flex flex-col items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span class="text-sm font-medium text-gray-500">Tambah Industri</span>
                                </div>
                            </div>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-gray-800 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                                <div class="text-center">
                                    <div class="font-medium">Akses Terbatas</div>
                                    <div class="text-gray-300">Hanya Siswa & Super Admin</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Tambah Guru -->
                    @if(auth()->user()->hasRole('super_admin'))
                        <a href="{{ route('guru.create') }}" class="p-4 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-lg border border-purple-200 transition group">
                            <div class="flex flex-col items-center text-center">
                                <x-heroicon-o-academic-cap class="h-6 w-6 text-purple-500 mb-2 group-hover:scale-110 transition-transform" />
                                <span class="text-sm font-medium text-gray-700">Tambah Guru</span>
                            </div>
                        </a>
                    @else
                        <div class="relative group">
                            <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg border border-gray-300 cursor-not-allowed opacity-60">
                                <div class="flex flex-col items-center text-center">
                                    <x-heroicon-o-academic-cap class="h-6 w-6 text-gray-400 mb-2" />
                                    <span class="text-sm font-medium text-gray-500">Tambah Guru</span>
                                </div>
                            </div>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-gray-800 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                                <div class="text-center">
                                    <div class="font-medium">Akses Terbatas</div>
                                    <div class="text-gray-300">Hanya Super Admin</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Lapor PKL -->
                    @if(auth()->user()->hasRole(['Siswa', 'super_admin']))
                        <a href="{{ route('pkl.create') }}" class="p-4 bg-gradient-to-r from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 rounded-lg border border-orange-200 transition group">
                            <div class="flex flex-col items-center text-center">
                                <x-heroicon-o-briefcase class="h-6 w-6 text-orange-500 mb-2 group-hover:scale-110 transition-transform" />
                                <span class="text-sm font-medium text-gray-700">Lapor PKL</span>
                            </div>
                        </a>
                    @else
                        <div class="relative group">
                            <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg border border-gray-300 cursor-not-allowed opacity-60">
                                <div class="flex flex-col items-center text-center">
                                    <x-heroicon-o-briefcase class="h-6 w-6 text-gray-400 mb-2" />
                                    <span class="text-sm font-medium text-gray-500">Lapor PKL</span>
                                </div>
                            </div>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-gray-800 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                                <div class="text-center">
                                    <div class="font-medium">Akses Terbatas</div>
                                    <div class="text-gray-300">Hanya Siswa & Super Admin</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- System Information -->
            <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Sistem
                </h3>
                
                <div class="space-y-4">
                    <!-- System Status -->
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">Status Sistem</span>
                        </div>
                        <span class="text-sm font-semibold text-green-600">Online</span>
                    </div>
                    
                    <!-- Database Status -->
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Database</span>
                        </div>
                        <span class="text-sm font-semibold text-blue-600">Terhubung</span>
                    </div>
                    
                    <!-- Last Backup -->
                    <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Backup Terakhir</span>
                        </div>
                        <span class="text-sm font-semibold text-yellow-600">{{ now()->subDays(1)->format('d/m/Y') }}</span>
                    </div>
                    
                    <!-- Version Info -->
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Versi Aplikasi</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-600">v2.1.0
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Notifications -->
        <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM8.5 14.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
                Pemberitahuan Penting
            </h3>
            
            <div class="space-y-3">
                <div class="flex items-start space-x-3 p-3 bg-amber-50 rounded-lg border border-amber-200">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">WAJIB DIKETAHUI</p>
                        <p class="text-xs text-gray-600 mt-1">Selain Admin tidak bisa menambahkan data Guru, data Siswa, data PKL dan data Industri. Untuk Siiswa dapat menambahkan Lapor PKL.</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Update Sistem</p>
                        <p class="text-xs text-gray-600 mt-1">Sistem telah diperbarui dengan fitur baru untuk pelaporan PKL yang lebih efisien.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>