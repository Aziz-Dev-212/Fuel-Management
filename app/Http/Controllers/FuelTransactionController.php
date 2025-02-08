<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Service;
use App\Models\FuelType;
use Illuminate\Http\Request;
use App\Models\FuelTransaction;
use App\Models\FuelStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class FuelTransactionController extends Controller
{
    public function index()
    {
        $transactions = FuelTransaction::with(['fuelType', 'car', 'service'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $fuelTypes = FuelType::all();
        $services = Service::all();
        return view('transactions.create', compact('fuelTypes', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'quantity' => 'required|numeric|min:0.01',
            'action' => 'required|in:add,consume',
            'service_id' => [
                Rule::requiredIf(fn () => $request->action === 'consume'),
                'nullable',
                'exists:services,id'
            ],
            'car_id' => [
                Rule::requiredIf(fn () => $request->action === 'consume'),
                'nullable',
                'exists:cars,id'
            ],
        ]);

        return DB::transaction(function () use ($request) {
            // Check stock before consuming
            if ($request->action === 'consume') {
                $stock = FuelStock::where('fuel_type_id', $request->fuel_type_id)
                    ->lockForUpdate()
                    ->first();

                if (!$stock || $stock->quantity < $request->quantity) {
                    return back()->withErrors(['quantity' => 'Insufficient fuel stock'])->withInput();
                }
            }

            // Create transaction
            $transaction = FuelTransaction::create($request->all());

            // Update stock
            $modifier = $request->action === 'add' ? $request->quantity : -$request->quantity;
            FuelStock::updateOrCreate(
                ['fuel_type_id' => $request->fuel_type_id],
                ['quantity' => DB::raw("quantity + $modifier")]
            );

            return redirect()->route('transactions.index')->with('success', 'Transaction recorded');
        });
    }

    public function destroy(FuelTransaction $transaction)
    {
        return DB::transaction(function () use ($transaction) {
            // Reverse stock change
            $modifier = $transaction->action === 'add' ? -$transaction->quantity : $transaction->quantity;
            
            FuelStock::where('fuel_type_id', $transaction->fuel_type_id)
                ->update(['quantity' => DB::raw("quantity + $modifier")]);

            $transaction->delete();

            return redirect()->route('transactions.index')->with('success', 'Transaction deleted');
        });
    }
}