<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-700 to-purple-700 bg-clip-text text-transparent leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl border border-indigo-100 p-8 flex justify-between items-center transition-all duration-300 hover:shadow-2xl hover:border-indigo-200">
            <div class="max-w-xl">
                <h3 class="text-3xl font-bold text-gray-800 mb-2">
                    Selamat Datang Kembali, <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ Auth::user()->name }}</span>!
                </h3>
                <p class="text-gray-600">
                    Ini adalah ringkasan aktivitas dan statistik penting sistem. Mari kita mulai bekerja!
                </p>
            </div>
            <div class="hidden sm:block">
                <svg class="w-20 h-20 text-indigo-400 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.108a9 9 0 10-14.832 9.444L3 21l3.5-3.5A9 9 0 0020.618 7.892z" />
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100 transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H4a2 2 0 01-2-2v-2a3 3 0 015.356-1.857M12 11V9a2 2 0 00-2-2h-2a2 2 0 00-2 2v2M15 11h.01M17 11h.01M12 16h.01M16 16h.01M18 16h.01" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Alumni</p>
                        <p class="text-2xl font-extrabold text-indigo-700 mt-1">
                            {{ number_format(1250, 0, ',', '.') }}
                        </p> 
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100 transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M10 16h.01" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Log Baru Hari Ini</p>
                        <p class="text-2xl font-extrabold text-purple-700 mt-1">
                            {{ number_format(15, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100 transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">User Aktif</p>
                        <p class="text-2xl font-extrabold text-pink-700 mt-1">
                            {{ number_format(7, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-2xl border border-gray-100">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4">Informasi Cepat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('alumni.index') }}" class="flex items-center p-4 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-all duration-200 group">
                        <div class="p-2 rounded-lg bg-indigo-500 group-hover:bg-indigo-600 text-white">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-indigo-800">Lihat Data Alumni</p>
                            <p class="text-sm text-indigo-600">Kelola dan lihat daftar lengkap data alumni.</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('profile.edit') }}" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-all duration-200 group">
                        <div class="p-2 rounded-lg bg-purple-500 group-hover:bg-purple-600 text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-purple-800">Ubah Profil Saya</p>
                            <p class="text-sm text-purple-600">Perbarui informasi akun dan password Anda.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>