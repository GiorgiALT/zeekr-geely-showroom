<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.cars.index', compact('cars'));
    }
    
    public function create()
    {
        return view('admin.cars.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:Electric,Hybrid,Petrol,Diesel',
            'transmission' => 'required|in:Automatic,Manual',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,sold,reserved',
            'is_featured' => 'boolean',
        ]);
        
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('cars', 'public');
        }
        
        // Set default for is_featured if not provided
        $validated['is_featured'] = $request->has('is_featured');
        
        Car::create($validated);
        
        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully!');
    }
    
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }
    
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:Electric,Hybrid,Petrol,Diesel',
            'transmission' => 'required|in:Automatic,Manual',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,sold,reserved',
            'is_featured' => 'boolean',
        ]);
        
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($car->main_image) {
                Storage::disk('public')->delete($car->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('cars', 'public');
        }
        
        // Set default for is_featured
        $validated['is_featured'] = $request->has('is_featured');
        
        $car->update($validated);
        
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully!');
    }
    
    public function destroy(Car $car)
    {
        // Delete image from storage
        if ($car->main_image) {
            Storage::disk('public')->delete($car->main_image);
        }
        
        $car->delete();
        
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully!');
    }
    
    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }
}