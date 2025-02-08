<?php

namespace App\Http\Controllers;

use App\Models\FuelStock;
use Illuminate\Http\Request;

class FuelStockController extends Controller {
    public function index() {
        $stocks = FuelStock::with('fuelType')->get();
        return view('stock.index', compact('stocks'));
    }

}
