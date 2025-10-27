<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-700 to-purple-700 bg-clip-text text-transparent leading-tight">
                {{ __('Log Aktivitas Sistem') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
            <div class="p-6">
                {{-- <div class="mb-6 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Aktivitas</h3>
                    </div> --}}

                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-50/70">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">
                                    Model
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">
                                    Pelaku (User)
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">
                                    Waktu
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($activities as $activity)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        @php
                                            $desc = strtolower($activity->description);
                                            $color = 'gray';
                                            if (str_contains($desc, 'created')) $color = 'green';
                                            else if (str_contains($desc, 'updated')) $color = 'indigo';
                                            else if (str_contains($desc, 'deleted')) $color = 'red';
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold leading-5 text-{{ $color }}-800 bg-{{ $color }}-100">
                                            {{ $activity->description }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span class="inline-flex items-center px-3 py-0.5 rounded-md text-xs font-medium bg-purple-100 text-purple-800">
                                            {{ $activity->subject_type ? class_basename($activity->subject_type) : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <div class="font-medium">{{ $activity->causer->name ?? 'Sistem' }}</div>
                                        <div class="text-xs text-gray-500">{{ $activity->causer->email ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <div class="whitespace-nowrap">{{ $activity->created_at->format('d M Y, H:i') }}</div>
                                        <div class="text-xs text-indigo-500">{{ $activity->created_at->diffForHumans() }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-base text-gray-500 bg-gray-50/50">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="font-medium">Tidak ada aktivitas yang tercatat saat ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-8">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>