<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Fuel Type</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('fuel_types.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Type</label>
                        <input type="text" name="type" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>