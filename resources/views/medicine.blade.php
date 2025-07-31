<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-800 leading-tight tracking-wide">
            {{ __('Medicine Inventory') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 shadow-md rounded-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-accent-dark text-text-light">
                        <tr>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Medicine</th>
                            <th class="px-4 py-3 text-left">Brand</th>
                            <th class="px-4 py-3 text-left">Dosage</th>
                            <th class="px-4 py-3 text-left">Category</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($medicines as $medicine)
                            <tr class="hover:bg-indigo-50 transition duration-150">
                                <td class="px-4 py-3">
                                    {{ $medicine->firstname ?? 'N/A' }} {{ $medicine->middlename ?? '' }} {{ $medicine->lastname ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $medicine->medicine_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $medicine->brand_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $medicine->dosage ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $medicine->category ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                    No medicine records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
