<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured cars for homepage
        $featuredCars = Car::where('is_featured', true)
                           ->where('status', 'available')
                           ->take(6)
                           ->get();
        
        // Get total cars count for stats
        $totalCars = Car::where('status', 'available')->count();
        
        return view('home.index', compact('featuredCars', 'totalCars'));
    }
}