<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fuel Transactions</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">New Transaction</a>
                <table class="w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Fuel Type</th>
                            <th class="border px-4 py-2">Quantity</th>
                            <th class="border px-4 py-2">Action</th>
                            <th class="border px-4 py-2">Service</th>
                            <th class="border px-4 py-2">Car</th>
                            <th class="border px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $transaction->fuelType->type }}</td>
                            <td class="border px-4 py-2">{{ $transaction->quantity }} L</td>
                            <td class="border px-4 py-2">{{ ucfirst($transaction->action) }}</td>
                            <td class="border px-4 py-2">{{ $transaction->service->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ optional($transaction->car)->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $transaction->transaction_date->format('d M Y H:i') }}</td>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>