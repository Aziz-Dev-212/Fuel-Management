<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\FuelType;
use App\Models\Service;
use Illuminate\Http\Request;

class CarController extends Controller {
    public function index() {
        $cars = Car::with(['fuelType', 'service'])->get();
        return view('cars.index', compact('cars'));
    }

    public function create() {
        $fuelTypes = FuelType::all();
        $services = Service::all();
        return view('cars.create', compact('fuelTypes', 'services'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'matricule' => 'required|unique:cars,matricule',
            'kilometrage' => 'required|integer',
            'model' => 'required',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'service_id' => 'required|exists:services,id',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added.');
    }

    public function edit(Car $car) {
        $fuelTypes = FuelType::all();
        $services = Service::all();
        return view('cars.edit', compact('car', 'fuelTypes', 'services'));
    }

    public function update(Request $request, Car $car) {
        $request->validate([
            'name' => 'required',
            'matricule' => 'required|unique:cars,matricule,' . $car->id,
            'kilometrage' => 'required|integer',
            'model' => 'required',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated.');
    }

    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted.');
    }
}