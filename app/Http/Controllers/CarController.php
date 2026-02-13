<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\TestDrive;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();
        
        // Filter by brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        
        // Filter by fuel type
        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }
        
        // Filter by max price
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        // Get paginated cars
        $cars = $query->orderBy('created_at', 'desc')->paginate(9);
        
        return view('cars.index', compact('cars'));
    }
    
    public function show(Car $car)
    {
        // Get similar cars (same brand, different model)
        $similarCars = Car::where('brand', $car->brand)
                          ->where('id', '!=', $car->id)
                          ->where('status', 'available')
                          ->take(3)
                          ->get();
        
        return view('cars.show', compact('car', 'similarCars'));
    }
    
    public function bookTestDrive(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required',
            'notes' => 'nullable|string',
        ]);
        
        TestDrive::create($validated);
        
        return redirect()->back()->with('success', 'Test drive booked successfully! We will contact you soon.');
    }
}