<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends Controller {
    public function index() {
        $fuelTypes = FuelType::all();
        return view('fuel_types.index', compact('fuelTypes'));
    }
}