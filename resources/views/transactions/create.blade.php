{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Fuel Transaction</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Fuel Type</label>
                        <select name="fuel_type_id" class="w-full px-4 py-2 border rounded" required>
                            @foreach ($fuelTypes as $fuelType)
                            <option value="{{ $fuelType->id }}">{{ $fuelType->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity (Liters)</label>
                        <input type="number" step="0.01" name="quantity" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Action</label>
                        <select name="action" class="w-full px-4 py-2 border rounded" required>
                            <option value="add">Add to Stock</option>
                            <option value="consume">Consume from Stock</option>
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
                    <div class="mb-4">
                        <label class="block text-gray-700">Car (Optional)</label>
                        <select name="car_id" class="w-full px-4 py-2 border rounded">
                            <option value="">Select Car</option>
                            @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->matricule }})</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Record Transaction</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Fuel Transaction</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    
                    <!-- Fuel Type -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Fuel Type *</label>
                        <select name="fuel_type_id" class="w-full px-4 py-2 border rounded" required>
                            @foreach ($fuelTypes as $fuelType)
                            <option value="{{ $fuelType->id }}">{{ $fuelType->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity (Liters) *</label>
                        <input type="number" step="0.01" name="quantity" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Action -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Action *</label>
                        <select name="action" id="action" class="w-full px-4 py-2 border rounded" required>
                            <option value="add">Add to Stock</option>
                            <option value="consume">Consume from Stock</option>
                        </select>
                    </div>

                    <!-- Conditional Fields (Service + Car) -->
                    <div id="consumptionFields" class="hidden">
                        <!-- Service -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Service *</label>
                            <select name="service_id" id="service" class="w-full px-4 py-2 border rounded">
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Car -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Car *</label>
                            <select name="car_id" id="car" class="w-full px-4 py-2 border rounded" disabled>
                                <option value="">Select Car</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Record Transaction</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const actionSelect = document.getElementById('action');
            const consumptionFields = document.getElementById('consumptionFields');
            const serviceSelect = document.getElementById('service');
            const carSelect = document.getElementById('car');

            // Toggle consumption fields
            actionSelect.addEventListener('change', function() {
                if (this.value === 'consume') {
                    consumptionFields.classList.remove('hidden');
                    serviceSelect.required = true;
                } else {
                    consumptionFields.classList.add('hidden');
                    serviceSelect.required = false;
                    carSelect.required = false;
                    carSelect.disabled = true;
                }
            });

            // Load cars when service changes
            serviceSelect.addEventListener('change', function() {
                if (!this.value) {
                    carSelect.innerHTML = '<option value="">Select Car</option>';
                    carSelect.disabled = true;
                    return;
                }

                fetch(`/api/cars-by-service/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        carSelect.innerHTML = '<option value="">Select Car</option>';
                        data.forEach(car => {
                            carSelect.innerHTML += `<option value="${car.id}">${car.name} (${car.matricule})</option>`;
                        });
                        carSelect.disabled = false;
                        carSelect.required = true;
                    });
            });
        });
    </script>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Fuel Transaction</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    
                    <!-- Fuel Type -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Fuel Type *</label>
                        <select name="fuel_type_id" class="w-full px-4 py-2 border rounded" required>
                            @foreach ($fuelTypes as $fuelType)
                            <option value="{{ $fuelType->id }}">{{ $fuelType->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity (Liters) *</label>
                        <input type="number" step="0.01" name="quantity" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Action -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Action *</label>
                        <select name="action" id="action" class="w-full px-4 py-2 border rounded" required>
                            <option value="add">Add to Stock</option>
                            <option value="consume">Consume from Stock</option>
                        </select>
                    </div>

                    <!-- Conditional Fields (Service + Car) -->
                    <div id="consumptionFields" class="hidden">
                        <!-- Service -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Service *</label>
                            <select name="service_id" id="service" class="w-full px-4 py-2 border rounded">
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Car -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Car *</label>
                            <select name="car_id" id="car" class="w-full px-4 py-2 border rounded" disabled>
                                <option value="">Select Car</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Record Transaction</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const actionSelect = document.getElementById('action');
            const consumptionFields = document.getElementById('consumptionFields');
            const serviceSelect = document.getElementById('service');
            const carSelect = document.getElementById('car');

            // Initialize fields
            const resetConsumptionFields = () => {
                serviceSelect.value = '';
                carSelect.innerHTML = '<option value="">Select Car</option>';
                carSelect.disabled = true;
            };

            // Toggle consumption fields
            actionSelect.addEventListener('change', function() {
                if (this.value === 'consume') {
                    consumptionFields.classList.remove('hidden');
                    serviceSelect.required = true;
                } else {
                    consumptionFields.classList.add('hidden');
                    serviceSelect.required = false;
                    carSelect.required = false;
                    resetConsumptionFields();
                }
            });

            // Load cars when service changes
            serviceSelect.addEventListener('change', function() {
                if (!this.value) {
                    carSelect.innerHTML = '<option value="">Select Car</option>';
                    carSelect.disabled = true;
                    return;
                }

                fetch(`/cars-by-service/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        carSelect.innerHTML = '<option value="">Select Car</option>';
                        data.forEach(car => {
                            carSelect.innerHTML += `<option value="${car.id}">${car.name} (${car.matricule})</option>`;
                        });
                        carSelect.disabled = false;
                        carSelect.required = true;
                    });
            });
        });
    </script>
</x-app-layout>