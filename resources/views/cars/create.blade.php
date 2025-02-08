<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Car</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Car Name</label>
                        <input type="text" name="name" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Matricule</label>
                        <input type="text" name="matricule" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Kilometrage</label>
                        <input type="number" name="kilometrage" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Model</label>
                        <input type="text" name="model" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Fuel Type</label>
                        <select name="fuel_type_id" class="w-full px-4 py-2 border rounded" required>
                            @foreach ($fuelTypes as $fuelType)
                                <option value="{{ $fuelType->id }}">{{ $fuelType->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Service</label>
                        <select name="service_id" class="w-full px-4 py-2 border rounded" required>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>