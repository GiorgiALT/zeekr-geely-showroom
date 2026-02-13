<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\ContactMessage;
use App\Models\TestDrive;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_cars' => Car::count(),
            'available_cars' => Car::where('status', 'available')->count(),
            'sold_cars' => Car::where('status', 'sold')->count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'pending_test_drives' => TestDrive::where('status', 'pending')->count(),
        ];
        
        // Recent test drives
        $recentTestDrives = TestDrive::with('car')
                                     ->orderBy('created_at', 'desc')
                                     ->take(5)
                                     ->get();
        
        // Recent messages
        $recentMessages = ContactMessage::orderBy('created_at', 'desc')
                                       ->take(5)
                                       ->get();
        
        return view('admin.dashboard', compact('stats', 'recentTestDrives', 'recentMessages'));
    }
    
    public function testDrives()
    {
        $testDrives = TestDrive::with('car')
                              ->orderBy('created_at', 'desc')
                              ->paginate(20);
        
        return view('admin.testdrives.index', compact('testDrives'));
    }
}