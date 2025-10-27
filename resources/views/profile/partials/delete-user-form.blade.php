<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-red-800">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-2 text-sm text-red-700">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 focus:ring-red-500 shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300"
    >{{ __('Hapus Akun Permanen') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="flex items-center space-x-3 mb-4">
                <div class="p-3 rounded-full bg-red-100 flex-shrink-0">
                    <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-red-800">
                    {{ __('Apakah Anda benar-benar yakin?') }}
                </h2>
            </div>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Setelah akun Anda dihapus, semua datanya akan hilang selamanya. Harap masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-6 py-2">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="px-6 py-2 text-white bg-red-600 hover:bg-red-700 focus:ring-red-500 shadow-md hover:shadow-lg transition-all duration-300">
                    {{ __('Ya, Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>