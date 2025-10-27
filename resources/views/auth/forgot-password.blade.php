<x-guest-layout>
    <h2 class="text-center text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
        Lupa Password?
    </h2>

    <div class="mb-6 text-sm text-gray-600 text-center">
        {{ __('Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk mereset password Anda.') }}
    </div>

    <x-auth-session-status class="mb-4 p-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-lg" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="sr-only" />
            <x-text-input id="email" class="block mt-1 w-full" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          placeholder="Email Anda"
                          required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-gradient-to-br from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-6">
            <a class="underline text-sm text-indigo-600 hover:text-indigo-800 transition-all rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Kembali ke Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>