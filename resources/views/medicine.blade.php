<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-text-base text-center leading-tight tracking-wide">
            {{ __('Medicine Inventory') }}
        </h2>
    </x-slot>

    <div class="py-10" x-data="{ showModal: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Add Button + Pagination Selector + Search -->
            <div class="flex flex-wrap gap-4 items-center justify-between mb-4">
                
                <button @click="showModal = true" class="bg-button-primary text-white px-4 py-2 rounded-md hover:bg-button-hover transition">
                    + Add Medicine
                </button>

                <input
                    type="search"
                    id="search"
                    placeholder="Search..."
                    class="w-96 border border-gray-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                />

                <form method="GET" action="{{ url()->current() }}">
                    <label for="perPage" class="text-sm mr-2">Per Page:</label>
                    <select name="perPage" id="perPage" onchange="this.form.submit()" class="border-orange-200 rounded-sm text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </form>
            </div>

            <!-- Table -->
            <div id="medicine-table" class="bg-white border border-gray-200 shadow-md rounded-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm text-text-base">
                    <thead class="bg-secondary-dark text-text-light">
                        <tr>
                            <th class="px-4 py-3 text-left">Medicine</th>
                            <th class="px-4 py-3 text-left">Brand</th>
                            <th class="px-4 py-3 text-left">Dosage</th>
                            <th class="px-4 py-3 text-left">Category</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="divide-y divide-gray-100 bg-white">
                        @include('profile.partials.medicine-table-body', ['medicines' => $medicines])
                    </tbody>
                </table>

                <!-- Table Footer -->
                <div class="flex flex-col sm:flex-row items-center justify-between px-4 py-4 bg-gray-50 border-t">
                    <div class="text-sm text-gray-600">
                        Showing {{ $medicines->firstItem() }} to {{ $medicines->lastItem() }} of {{ $medicines->total() }} medicines
                    </div>
                    <div class="mt-2 sm:mt-0">
                        {{ $medicines->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <x-add-modal showModal="showModal" />
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                const query = $(this).val();

                $.ajax({
                    url: "{{ route('medicines.search') }}", // Make sure this route exists
                    type: 'GET',
                    data: { query: query },
                    success: function (response) {
                        $('#table-body').html(response.table);
                    },
                    error: function (xhr) {
                        console.error('Error fetching data:', xhr);
                    }
                });
            });
        });
    </script>
</x-app-layout>
