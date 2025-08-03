<div
    x-show="showModal"
    x-transition
    class="fixed inset-0 z-50 bg-white/30 backdrop-blur-md flex items-center justify-center"
    style="display: none;"
>
    <div
        @click.outside="showModal = false"
        class="bg-white rounded-lg shadow-lg w-full max-w-md p-9"
        x-show="showModal"
        x-transition
    >
        <h2 class="text-lg font-semibold mb-4">Add New Medicine</h2>

        <form method="POST" action="{{ route('medicines.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Medicine</label>
                    <input type="text" name="medicine_name"
                        placeholder="e.g., Paracetamol"
                        class="w-full border-accent-dark px-3 py-2 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-accent">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Brand</label>
                    <input type="text" name="brand_name"
                        placeholder="e.g., BrandName"
                        class="w-full border-accent-dark px-3 py-2 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-accent">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Dosage</label>
                    <input type="text" name="dosage"
                        placeholder="e.g., 500mg"
                        class="w-full border-accent-dark px-3 py-2 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-accent">
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700">Category</label>
                    <select name="catergory"
                        class="w-full border-accent-dark px-3 py-2 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-accent">
                        <option value="" disabled selected>Select category</option>
                        <option value="Antibiotic">Antibiotic</option>
                        <option value="Analgesic">Analgesic</option>
                        <option value="Antiviral">Antiviral</option>
                        <option value="Vaccine">Vaccine</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end space-x-2 mt-6">
                <button type="button"
                    @click="showModal = false"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-button-primary text-white rounded hover:bg-button-hover">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
