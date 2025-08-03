@forelse ($medicines as $medicine)
<tr class="hover:bg-secondary-light transition duration-150 ease-in-out">
    <td class="px-4 py-3 whitespace-nowrap">{{ $medicine->medicine_name ?? 'N/A' }}</td>
    <td class="px-4 py-3 whitespace-nowrap">{{ $medicine->brand_name ?? 'N/A' }}</td>
    <td class="px-4 py-3 whitespace-nowrap">{{ $medicine->dosage ?? 'N/A' }}</td>
    <td class="px-4 py-3 whitespace-nowrap">{{ $medicine->category ?? 'N/A' }}</td>
    <td class="px-4 py-3">
        <div class="flex items-center gap-2">
            <!-- Action buttons here -->
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="px-4 py-3 text-center text-gray-500">No medicine records found.</td>
</tr>
@endforelse
