<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <div class="flex flex-col gap-2 mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Atur Ulang Kata Sandi</h2>
        <p class="text-sm text-gray-500">Silakan masukkan kata sandi baru Anda di bawah ini</p>
    </div>

    <!-- Status Sesi -->
    <x-auth-session-status class="text-center mb-4 text-green-600" :status="session('status')" />

    <form wire:submit="resetPassword" class="flex flex-col gap-4">
        <!-- Alamat Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <flux:input
                wire:model="email"
                type="email"
                required
                autocomplete="email"
                class="w-full"
            />
        </div>

        <!-- Kata Sandi Baru -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
            <flux:input
                wire:model="password"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Kata sandi baru"
                viewable
                class="w-full"
            />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
            <flux:input
                wire:model="password_confirmation"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Ulangi kata sandi baru"
                viewable
                class="w-full"
            />
        </div>

        <div class="mt-4">
            <flux:button
                type="submit"
                variant="primary"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg py-2 transition"
            >
                Atur Ulang Kata Sandi
            </flux:button>
        </div>
    </form>
</div>
<script>
    document.title = 'Resset Password';
</script>