<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    public function index() {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create() {
        return view('services.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:services,name']);
        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service added.');
    }

    public function edit(Service $service) {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service) {
        $request->validate(['name' => 'required|unique:services,name,' . $service->id]);
        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted.');
    }
}