<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <div class="flex flex-col gap-2 mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Masuk ke Akun Anda</h2>
        <p class="text-sm text-gray-500">Masukkan email dan kata sandi Anda di bawah untuk masuk</p>
    </div>

    <!-- Status Sesi -->
    <x-auth-session-status class="text-center mb-4 text-green-600" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-4">
 <form wire:submit="login" class="relative z-10 flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
            class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="('Password')"
                viewable
                class="bg-gray-800 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />

            @if (Route::has('password.request'))
                <flux:link 
                    class="absolute right-0 top-0 text-sm text-blue-400 hover:text-blue-300 hover:underline transition-colors" 
                    :href="route('password.request')" 
                    wire:navigate
                >
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Ingat Saya -->
        <div class="flex items-center">
            <flux:checkbox wire:model="remember" />
            <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
        </div>

        <div class="mt-4">
            <flux:button
                variant="primary"
                type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg py-2 transition"
            >
                Masuk Sekarang
            </flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <flux:link
                :href="route('register')"
                wire:navigate
                class="text-blue-600 hover:text-blue-800 font-semibold"
            >
                Daftar di sini
            </flux:link>
        </div>
    @endif
</div>
<!-- TITLE LOGIN -->
<script>
    document.title = 'Login';
</script>




