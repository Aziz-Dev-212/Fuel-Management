<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cars</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('cars.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Car</a>
                
                <table class="w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Matricule</th>
                            <th class="border px-4 py-2">Service</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $car->name }}</td>
                            <td class="border px-4 py-2">{{ $car->matricule }}</td>
                            <td class="border px-4 py-2">{{ $car->service->name }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('cars.edit', $car) }}" class="text-blue-500">Edit</a> |
                                <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>