<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeekr & Geely Showroom - Premium Electric & Hybrid Vehicles</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">

<!-- Top Bar -->
<div class="bg-brand-dark text-white py-2 text-sm">
    <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
        <div class="flex gap-4 text-xs md:text-sm">
            <a href="tel:+995555123456" class="hover:text-brand-pink transition">📞 +995 555 123 456</a>
            <a href="mailto:info@zeekrgeely.ge" class="hover:text-brand-pink transition hidden md:inline">✉️ info@zeekrgeely.ge</a>
        </div>
        <div class="flex gap-3">
            <a href="#" class="hover:text-brand-pink transition">Facebook</a>
            <a href="#" class="hover:text-brand-pink transition">Instagram</a>
            <a href="#" class="hover:text-brand-pink transition">TikTok</a>
            <a href="#" class="hover:text-brand-pink transition">LinkedIn</a>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">
                <div class="text-3xl">🚗</div>
                <div>
                    <div class="text-2xl font-bold text-brand-red">ZEEKR & GEELY</div>
                    <div class="text-xs text-gray-600">Premium Electric Vehicles</div>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
                <li><a href="/" class="hover:text-brand-red transition">Home</a></li>
                <li><a href="/cars" class="hover:text-brand-red transition">Our Cars</a></li>
                <li><a href="/about" class="hover:text-brand-red transition">About Us</a></li>
                <li><a href="/contact" class="hover:text-brand-red transition">Contact</a></li>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <li><a href="/admin/dashboard" class="bg-brand-red text-white px-4 py-2 rounded-lg hover:bg-brand-dark transition">Dashboard</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-brand-red transition">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="/login" class="bg-brand-red text-white px-6 py-2 rounded-lg hover:bg-brand-dark transition">Login</a></li>
                @endauth
            </ul>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-brand-red text-3xl focus:outline-none">
                <span id="menu-icon">☰</span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <ul id="mobile-menu" class="md:hidden hidden bg-white pb-4 space-y-3 text-gray-700 font-medium">
            <li><a href="/" class="block py-2 hover:text-brand-red transition">Home</a></li>
            <li><a href="/cars" class="block py-2 hover:text-brand-red transition">Our Cars</a></li>
            <li><a href="/about" class="block py-2 hover:text-brand-red transition">About Us</a></li>
            <li><a href="/contact" class="block py-2 hover:text-brand-red transition">Contact</a></li>
            
            @auth
                @if(auth()->user()->isAdmin())
                    <li><a href="/admin/dashboard" class="block py-2 bg-brand-red text-white px-4 rounded-lg">Dashboard</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-brand-red transition w-full text-left">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="/login" class="block py-2 bg-brand-red text-white px-4 rounded-lg text-center">Login</a></li>
            @endauth
        </ul>
    </div>
</nav>

<!-- Mobile Menu Toggle Script -->
<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIcon.textContent = mobileMenu.classList.contains('hidden') ? '☰' : '✕';
    });
</script>