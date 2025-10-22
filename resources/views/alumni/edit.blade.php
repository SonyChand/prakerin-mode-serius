<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Alumni: ') }} {{ $alumni->nama_lengkap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap', $alumni->nama_lengkap)" required autofocus />
                            </div>

                            <div>
                                <x-input-label for="asal_sekolah" :value="__('Asal Sekolah')" />
                                <x-text-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah" :value="old('asal_sekolah', $alumni->asal_sekolah)" required />
                            </div>

                            <div>
                                <x-input-label for="jurusan" :value="__('Jurusan')" />
                                <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan" :value="old('jurusan', $alumni->jurusan)" required />
                            </div>

                            <div>
                                <x-input-label for="tahun_mulai" :value="__('Tahun Mulai')" />
                                <x-text-input id="tahun_mulai" class="block mt-1 w-full" type="number" name="tahun_mulai" :value="old('tahun_mulai', $alumni->tahun_mulai)" required />
                            </div>

                            <div>
                                <x-input-label for="tahun_selesai" :value="__('Tahun Selesai')" />
                                <x-text-input id="tahun_selesai" class="block mt-1 w-full" type="number" name="tahun_selesai" :value="old('tahun_selesai', $alumni->tahun_selesai)" required />
                            </div>

                            <div>
                                <x-input-label for="foto" :value="__('Ganti Foto (Opsional)')" />
                                <input id="foto" name="foto" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" accept="image/*">
                                <p class="mt-1 text-sm text-gray-500">Tipe file: JPG, PNG. Max 2MB.</p>
                                @if ($alumni->foto)
                                    <div class="mt-2">
                                        <p class="text-sm font-medium">Foto Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto Alumni" class="h-20 w-20 rounded-full object-cover">
                                    </div>
                                @endif
                            </div>

                            <div>
                                <x-input-label for="hasil_karya" :value="__('Ganti Hasil Karya (Opsional)')" />
                                <input id="hasil_karya" name="hasil_karya" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" accept=".pdf,.zip,.doc,.docx">
                                <p class="mt-1 text-sm text-gray-500">Tipe file: PDF, ZIP, DOC. Max 5MB.</p>
                                @if ($alumni->hasil_karya)
                                    <div class="mt-2">
                                        <p class="text-sm font-medium">File Saat Ini:</p>
                                        <a href="{{ asset('storage/' . $alumni->hasil_karya) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat File</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('alumni.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Update Data') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>