<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <div class="flex flex-col gap-2 mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Lupa Kata Sandi</h2>
        <p class="text-sm text-gray-500">Masukkan email Anda untuk menerima tautan reset kata sandi</p>
    </div>

    <!-- Status Sesi -->
    <x-auth-session-status class="text-center mb-4 text-green-600" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-4">
        <!-- Alamat Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <flux:input
                wire:model="email"
                type="email"
                required
                autofocus
                placeholder="email@contoh.com"
                class="w-full"
            />
        </div>

        <div class="mt-4">
            <flux:button
                variant="primary"
                type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg py-2 transition"
            >
                Kirim Tautan Reset Kata Sandi
            </flux:button>
        </div>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600">
        Atau, kembali ke
        <flux:link :href="route('login')" wire:navigate class="text-blue-600 hover:text-blue-800 font-semibold">
            Masuk
        </flux:link>
    </div>
</div>
<script>
    document.title = 'Lupa Password';
</script>