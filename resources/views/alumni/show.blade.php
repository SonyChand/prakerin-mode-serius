<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Alumni: ') }} {{ $alumni->nama_lengkap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <img src="{{ $alumni->foto ? asset('storage/' . $alumni->foto) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->nama_lengkap) }}" alt="Foto {{ $alumni->nama_lengkap }}" class="w-full h-auto rounded-lg shadow-md object-cover">
                        </div>

                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Nama Lengkap</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $alumni->nama_lengkap }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Asal Sekolah</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $alumni->asal_sekolah }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Jurusan</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $alumni->jurusan }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Periode Prakerin</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $alumni->tahun_mulai }} - {{ $alumni->tahun_selesai }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Hasil Karya</h3>
                                @if ($alumni->hasil_karya)
                                    <a href="{{ asset('storage/' . $alumni->hasil_karya) }}" target="_blank" class="mt-1 text-sm text-indigo-600 hover:underline">
                                        Download/Lihat Hasil Karya
                                    </a>
                                @else
                                    <p class="mt-1 text-sm text-gray-500">Tidak ada file hasil karya yang diupload.</p>
                                @endif
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Diinput oleh</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $alumni->user->name ?? 'N/A' }} ({{ $alumni->user->email ?? '' }})</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('alumni.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                            Kembali ke Daftar
                        </a>
                        @can('manage alumni')
                        <a href="{{ route('alumni.edit', $alumni->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit Data
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>