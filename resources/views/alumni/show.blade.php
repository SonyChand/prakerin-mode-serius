<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-700 to-purple-700 bg-clip-text text-transparent leading-tight">
                    {{ __('Detail Alumni') }}
                </h2>
            </div>
             <div class="flex items-center space-x-3">
                <a href="{{ route('alumni.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                    Kembali
                </a>
                @can('manage alumni')
                <a href="{{ route('alumni.edit', $alumni->id) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-indigo-600 to-purple-700 text-white font-semibold text-xs uppercase tracking-widest rounded-lg shadow-md hover:shadow-lg transition ease-in-out duration-150">
                    Edit Data
                </a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="md:col-span-1">
                        <img src="{{ $alumni->foto ? asset('storage/' . $alumni->foto) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->nama_lengkap).'&background=E8DEFF&color=7C3AED&size=256' }}" 
                             alt="Foto {{ $alumni->nama_lengkap }}" 
                             class="w-full h-auto rounded-2xl shadow-xl object-cover aspect-square">
                    </div>

                    <div class="md:col-span-2 space-y-6">
                        
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $alumni->nama_lengkap }}</p>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Asal Sekolah</p>
                                <p class="mt-1 text-lg font-semibold text-gray-800">{{ $alumni->asal_sekolah }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Jurusan</p>
                                <p class="mt-1 text-lg font-semibold text-gray-800">{{ $alumni->jurusan }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Periode Prakerin</p>
                            <p class="mt-1 text-lg font-semibold text-gray-800">{{ $alumni->tahun_mulai }} - {{ $alumni->tahun_selesai }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Hasil Karya</p>
                            @if ($alumni->hasil_karya)
                                <a href="{{ asset('storage/' . $alumni->hasil_karya) }}" target="_blank" 
                                   class="inline-flex items-center mt-2 px-4 py-2 bg-indigo-50 text-indigo-700 font-semibold text-sm rounded-lg hover:bg-indigo-100 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download Hasil Karya
                                </a>
                            @else
                                <p class="mt-1 text-sm text-gray-500 italic">Tidak ada file hasil karya yang diupload.</p>
                            @endif
                        </div>
                        
                        <div class="pt-6 border-t border-gray-200">
                            <p class="text-sm font-medium text-gray-500">Data Diinput oleh</p>
                            <p class="mt-1 text-base font-semibold text-gray-800">{{ $alumni->user->name ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-600">{{ $alumni->user->email ?? '-' }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>