<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-700 to-purple-700 bg-clip-text text-transparent leading-tight">
                {{ __('Tambah Data Alumni Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
            <div class="p-6 sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-700 border border-red-200 rounded-lg shadow-sm">
                        <div class="font-bold">{{ __('Whoops! Ada beberapa masalah.') }}</div>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="asal_sekolah" :value="__('Asal Sekolah')" />
                            <x-text-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah" :value="old('asal_sekolah')" required />
                        </div>

                        <div>
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan" :value="old('jurusan')" required />
                        </div>

                        <div>
                            <x-input-label for="tahun_mulai" :value="__('Tahun Mulai')" />
                            <x-text-input id="tahun_mulai" class="block mt-1 w-full" type="number" name="tahun_mulai" :value="old('tahun_mulai')" required placeholder="Contoh: 2023" />
                        </div>

                        <div>
                            <x-input-label for="tahun_selesai" :value="__('Tahun Selesai')" />
                            <x-text-input id="tahun_selesai" class="block mt-1 w-full" type="number" name="tahun_selesai" :value="old('tahun_selesai')" required placeholder="Contoh: 2024" />
                        </div>
                        
                        <div>
                            <x-input-label for="foto" :value="__('Upload Foto (Opsional)')" />
                            <input id="foto" name="foto" type="file" 
                                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
                                   accept="image/*">
                            <p class="mt-1 text-xs text-gray-500">Tipe file: JPG, PNG. Max 2MB.</p>
                        </div>
                        
                        <div class="md:col-span-2">
                            <x-input-label for="hasil_karya" :value="__('Upload Hasil Karya (Opsional)')" />
                            <input id="hasil_karya" name="hasil_karya" type="file" 
                                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
                                   accept=".pdf,.zip,.doc,.docx">
                            <p class="mt-1 text-xs text-gray-500">Tipe file: PDF, ZIP, DOC. Max 5MB.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('alumni.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                        
                        <x-primary-button class="ms-4 px-6 py-3 bg-gradient-to-br from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300">
                            {{ __('Simpan Data') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>