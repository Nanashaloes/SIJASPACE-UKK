<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <style>
        /* Hapus scrollbar tetapi tetap bisa scroll jika diperlukan */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Active menu item styling */
        .menu-item-active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
            transform: translateX(2px);
        }

        /* Logo animation */
        .logo-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">

    <flux:sidebar sticky stashable class="w-64 min-w-[16rem] border-e border-blue-200 bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 text-white shadow-2xl overflow-y-auto no-scrollbar">
    <flux:sidebar.toggle class="lg:hidden text-white hover:text-blue-100" icon="x-mark" />

    <!-- Logo Area dengan backdrop blur, logo di tengah dan backdrop dipanjangkan -->
    <div class="bg-blue-600/30 backdrop-blur-sm mb-3 pt-3 pb-2 border-b border-blue-400/30 w-full flex justify-center">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center" wire:navigate>
            <x-app-logo />
        </a>
    </div>


    <!-- User Profile Card yang disederhanakan -->
    <div class="mx-3 mb-4 p-3 bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-md rounded-xl border border-white/20 shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center flex-1">
                <div class="relative">
                    <div class="h-11 w-11 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold flex items-center justify-center text-sm shadow-lg border-2 border-white/30">
                        {{ auth()->user()->initials() }}
                    </div>
                    <div class="absolute -bottom-1 -right-1 h-4 w-4 bg-green-400 rounded-full border-2 border-blue-600 shadow-sm"></div>
                </div>
                <div class="ml-3 flex-1 min-w-0 max-w-[100px]">
                    <div class="text-sm font-bold text-white truncate mb-0.5 overflow-hidden">{{ auth()->user()->name }}</div>
                    <!-- Role sebagai teks biasa -->
                    @php
                        $roleInfo = [
                            'super_admin' => ['text' => 'Super Admin', 'color' => 'text-purple-200'],
                            'guru' => ['text' => 'Guru', 'color' => 'text-blue-200'],
                            'siswa' => ['text' => 'Siswa', 'color' => 'text-green-200'],
                        ];
                        $currentRole = auth()->user()->hasRole('super_admin') ? 'super_admin' : (auth()->user()->hasRole('Guru') ? 'guru' : 'siswa');
                        $role = $roleInfo[$currentRole];
                    @endphp
                    <div class="text-xs font-medium {{ $role['color'] }} truncate">{{ $role['text'] }}</div>
                </div>
            </div>
            
            <!-- Dropdown menu tetap di sebelah kanan -->
            <flux:dropdown position="bottom" align="end">
                <button class="p-2 rounded-lg hover:bg-white/10 transition-all duration-200 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v.01M12 12v.01M12 19v.01" />
                    </svg>
                </button>
                <flux:menu class="w-[240px]">
                    <flux:menu.radio.group>
                        <div class="px-4 py-3 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                            <div class="flex items-center space-x-3">
                                <span class="relative flex h-12 w-12 shrink-0 overflow-hidden rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold justify-center items-center shadow-md">
                                    {{ auth()->user()->initials() }}
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-bold text-gray-900">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-gray-600">{{ auth()->user()->email }}</span>
                                    <span class="truncate text-xs font-medium text-gray-700 mt-0.5">{{ $role['text'] }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>
                    <flux:menu.separator />
                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>
                    <flux:menu.separator />
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="px-3">
        <flux:navlist variant="outline" class="mb-4 text-sm">
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" 
                class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2.5 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'menu-item-active pl-2' : '' }}" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navlist.item>
        </flux:navlist>
    </div>

    <!-- Data Personal -->
        <div class="px-3">
            <h3 class="px-3 py-2 mb-2 text-xs uppercase tracking-wider font-bold text-blue-100 flex items-center bg-white/5 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                {{ __('Data Personal') }}
            </h3>
            <flux:navlist variant="outline" class="mb-4 text-sm">
                <flux:navlist.group class="grid gap-1">
                    <flux:navlist.item icon="user" :href="route('siswa')" :current="request()->routeIs('siswa')" 
                        class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2 transition-all duration-200 {{ request()->routeIs('siswa') ? 'menu-item-active pl-2' : '' }}" wire:navigate>
                        {{ __('Siswa') }}
                    </flux:navlist.item>
                    @if(auth()->user()->hasRole(['Guru', 'super_admin']))
                        <flux:navlist.item icon="academic-cap" :href="route('guru')" :current="request()->routeIs('guru')" 
                            class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2 transition-all duration-200 {{ request()->routeIs('guru') ? 'menu-item-active pl-2' : '' }}" wire:navigate>
                            {{ __('Guru') }}
                        </flux:navlist.item>
                    @endif
                </flux:navlist.group>
            </flux:navlist>
        </div>


    <!-- Data PKL -->
    <div class="px-3">
        <h3 class="px-3 py-2 mb-2 text-xs uppercase tracking-wider font-bold text-blue-100 flex items-center bg-white/5 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            {{ __('Data PKL') }}
        </h3>
        <flux:navlist variant="outline" class="mb-4 text-sm">
            <flux:navlist.group class="grid gap-1">
                <flux:navlist.item icon="building-office-2" :href="route('industri')" :current="request()->routeIs('industri')" 
                    class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2 transition-all duration-200 {{ request()->routeIs('industri') ? 'menu-item-active pl-2' : '' }}" wire:navigate>
                    {{ __('Industri') }}
                </flux:navlist.item>
                <flux:navlist.item icon="briefcase" :href="route('pkl')" :current="request()->routeIs('pkl')" 
                    class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2 transition-all duration-200 {{ request()->routeIs('pkl') ? 'menu-item-active pl-2' : '' }}" wire:navigate>
                    {{ __('Status PKL') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    </div>

    <!-- System Status Info -->
    <div class="mx-3 mb-4 p-3 bg-gradient-to-r from-green-500/20 to-blue-500/20 backdrop-blur-sm rounded-xl border border-white/20">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center">
                <div class="h-2 w-2 bg-green-400 rounded-full mr-2 notification-badge"></div>
                <span class="font-bold text-xs text-white">System Online</span>
            </div>
            <!-- Tambahkan ID di sini -->
            <span id="system-clock" class="text-xs text-blue-100">{{ now()->format('H:i:s') }}</span>
        </div>
        <div class="text-xs text-blue-100">
            <div class="flex justify-between items-center">
                <span>Last Update:</span>
                <span class="font-medium">{{ now()->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Script real-time clock updater -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const clockEl = document.getElementById('system-clock');
            if (!clockEl) return;

            // Ambil waktu awal dari teks (misal "14:35:27")
            const [initialHour, initialMinute, initialSecond] = clockEl.textContent.split(':').map(Number);
            let now = new Date();
            now.setHours(initialHour, initialMinute, initialSecond, 0);

            function updateClockDisplay() {
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                clockEl.textContent = `${hours}:${minutes}:${seconds}`;
            }

            updateClockDisplay();

            // Update setiap detik
            setInterval(() => {
                now.setSeconds(now.getSeconds() + 1);
                updateClockDisplay();
            }, 1000);
        });
    </script>

    <!-- Navigasi kembali -->
    <div class="px-3">
        <flux:navlist variant="outline" class="text-sm mb-4">
            <flux:navlist.item icon="arrow-left" :href="route('home')" 
                class="font-semibold text-white hover:bg-white/15 rounded-lg px-3 py-2.5 transition-all duration-200" wire:navigate>
                {{ __('Kembali') }}
            </flux:navlist.item>
        </flux:navlist>
    </div>

    <!-- Footer Info yang diperbaiki -->
    <div class="mt-auto px-4 py-3 text-xs text-center text-blue-200/80 border-t border-white/20 bg-gradient-to-r from-white/5 to-transparent">
        <div class="font-bold text-white">PKL Management System</div>
        <div class="text-[10px] mt-1 text-blue-300/70">© 2025 All Rights Reserved</div>
        <div class="text-[9px] mt-0.5 text-blue-400/60">v2.1.0</div>
    </div>
    </flux:sidebar>

    <!-- Mobile Sidebar yang diperbaiki -->
    <flux:header class="lg:hidden bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg">
        <flux:sidebar.toggle class="lg:hidden text-white hover:text-blue-100" icon="bars-2" inset="left" />
        <span class="font-bold text-lg gradient-text">PKL SYSTEM</span>
        <flux:spacer />
        <flux:dropdown position="top" align="end">
            <div class="relative">
                <div class="h-9 w-9 rounded-xl bg-gradient-to-br from-blue-700 to-blue-900 text-white font-bold flex items-center justify-center border-2 border-white/40 shadow-md">
                    {{ auth()->user()->initials() }}
                </div>
                <div class="absolute -bottom-0.5 -right-0.5 h-3.5 w-3.5 bg-green-400 rounded-full border-2 border-blue-600 shadow-sm"></div>
            </div>
            <flux:menu class="w-[260px]">
                <flux:menu.radio.group>
                    <div class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <span class="relative flex h-10 w-10 overflow-hidden rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold items-center justify-center shadow-md">
                            {{ auth()->user()->initials() }}
                        </span>
                        <div class="grid text-sm flex-1">
                            <span class="font-bold text-gray-900">{{ auth()->user()->name }}</span>
                            <span class="text-xs text-gray-600">{{ auth()->user()->email }}</span>
                            <span class="text-xs font-medium text-gray-700 mt-0.5">{{ $role['text'] }}</span>
                        </div>
                    </div>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>
</html>