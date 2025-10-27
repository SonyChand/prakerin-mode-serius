<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portal Alumni') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes blob {
                0%, 100% {
                    transform: translate(0px, 0px) scale(1);
                }
                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }
                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="relative min-h-screen flex flex-col items-center bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 overflow-x-hidden">
            
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-20 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
                <div class="absolute top-40 right-10 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
            </div>

            <nav class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex justify-between items-center">
                    <a href="/" class="flex items-center space-x-3 group">
                         <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg group-hover:shadow-lg transition-all duration-300">
                             <x-application-logo class="block h-6 w-6 fill-current text-white" />
                         </div>
                         <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                             {{ config('app.name', 'Alumni') }}
                         </span>
                    </a>

                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-6 py-2 bg-gradient-to-br from-indigo-600 to-purple-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:from-indigo-700 hover:to-purple-800 transition-all duration-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold text-indigo-700 bg-white/70 backdrop-blur-sm rounded-lg shadow-sm hover:bg-white transition-all duration-300">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="hidden sm:inline-flex items-center justify-center px-5 py-2 text-sm bg-gradient-to-br from-indigo-600 to-purple-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:from-indigo-700 hover:to-purple-800 transition-all duration-300">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>

            <div class="relative z-10 flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <section class="text-center pt-24 pb-32 sm:pt-32 sm:pb-40">
                    <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-gray-900">
                        Selamat Datang di
                        <span class="block bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            Portal Alumni
                        </span>
                    </h1>
                    <p class="mt-6 text-xl text-gray-700 max-w-3xl mx-auto">
                        Terhubung kembali dengan rekan lama, bagikan kisah sukses Anda, dan tetap update dengan komunitas kita.
                    </p>
                    <div class="mt-10">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-br from-indigo-600 to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-indigo-700 hover:to-purple-800 transition-all duration-300 transform hover:scale-105">
                            Bergabung Sekarang
                        </a>
                    </div>
                </section>

                <section class="pb-24 sm:pb-32">
                    <h2 class="text-4xl font-bold text-center text-gray-800">Fitur Utama Kami</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 text-center transform transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900">Jaringan Alumni</h3>
                            <p class="mt-4 text-gray-600">
                                Temukan dan terhubung kembali dengan teman seangkatan Anda atau senior di direktori alumni kami yang komprehensif.
                            </p>
                        </div>

                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 text-center transform transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                                 <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900">Karya & Portofolio</h3>
                            <p class="mt-4 text-gray-600">
                                Bagikan pencapaian, proyek, dan karya profesional Anda kepada komunitas untuk inspirasi dan kolaborasi.
                            </p>
                        </div>

                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 text-center transform transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-3-3h.01M17 10h.01" />
                                </svg>
                            </div>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900">Berita & Acara</h3>
                            <p class="mt-4 text-gray-600">
                                Tetap terinformasi dengan berita terbaru dari almamater, acara mendatang, dan pertemuan alumni.
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="relative z-10 w-full max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-600">
                <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </footer>

        </div>
    </body>
</html>