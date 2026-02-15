@include('layouts.header')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-brand-dark to-brand-red text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute transform rotate-45 -right-20 -top-20 w-96 h-96 bg-brand-pink rounded-full"></div>
        <div class="absolute transform -rotate-45 -left-20 -bottom-20 w-96 h-96 bg-brand-accent rounded-full"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
                    Welcome to the Future of
                    <span class="text-brand-pink">Electric Mobility</span>
                </h1>
                <p class="text-xl mb-8 text-gray-200">
                    Discover premium Zeekr & Geely electric and hybrid vehicles. 
                    Experience innovation, luxury, and sustainability.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="/cars" class="bg-white text-brand-red px-8 py-4 rounded-lg font-bold hover:bg-brand-pink hover:text-white transition shadow-lg text-center">
                        Browse Our Cars
                    </a>
                    <a href="/contact" class="bg-transparent border-2 border-white px-8 py-4 rounded-lg font-bold hover:bg-white hover:text-brand-red transition text-center">
                        Contact Us
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-brand-light to-white rounded-lg shadow-md">
                <div class="text-4xl font-bold text-brand-red mb-2">{{ $totalCars }}+</div>
                <div class="text-gray-600 font-semibold">Cars Available</div>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-brand-light to-white rounded-lg shadow-md">
                <div class="text-4xl font-bold text-brand-red mb-2">500+</div>
                <div class="text-gray-600 font-semibold">Happy Customers</div>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-brand-light to-white rounded-lg shadow-md">
                <div class="text-4xl font-bold text-brand-red mb-2">5★</div>
                <div class="text-gray-600 font-semibold">Customer Rating</div>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-brand-light to-white rounded-lg shadow-md">
                <div class="text-4xl font-bold text-brand-red mb-2">24/7</div>
                <div class="text-gray-600 font-semibold">Support Available</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Cars -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-brand-dark mb-4">Featured Vehicles</h2>
            <p class="text-gray-600 text-lg">Discover our hand-picked selection of premium electric vehicles</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredCars as $car)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $car->main_image) }}" 
                             alt="{{ $car->brand }} {{ $car->model }}" 
                             class="w-full h-64 object-cover">
                        
                        @if($car->status === 'available')
                            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Available
                            </span>
                        @elseif($car->status === 'reserved')
                            <span class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Reserved
                            </span>
                        @else
                            <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Sold
                            </span>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-brand-red uppercase">{{ $car->brand }}</span>
                            <span class="text-sm text-gray-500">{{ $car->year }}</span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $car->model }}</h3>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                            <span>⚡ {{ $car->fuel_type }}</span>
                            <span>🔧 {{ $car->transmission }}</span>
                            <span>🎨 {{ $car->color }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="text-3xl font-bold text-brand-red">
                                {{ $car->formatted_price }}
                            </div>
                            <a href="{{ route('cars.show', $car) }}" 
                               class="bg-brand-red text-white px-6 py-2 rounded-lg hover:bg-brand-dark transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">No featured cars available at the moment.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="/cars" class="bg-brand-red text-white px-8 py-3 rounded-lg font-bold hover:bg-brand-dark transition inline-block">
                View All Cars →
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-brand-dark mb-4">Why Choose Zeekr & Geely?</h2>
            <p class="text-gray-600 text-lg">Your trusted partner for premium electric vehicles</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gradient-to-br from-brand-light to-white rounded-2xl shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">🏆</div>
                <h3 class="text-xl font-bold text-brand-dark mb-3">Premium Quality</h3>
                <p class="text-gray-600">
                    Only the finest electric and hybrid vehicles from Zeekr & Geely, 
                    rigorously tested for quality and performance.
                </p>
            </div>

            <div class="text-center p-8 bg-gradient-to-br from-brand-light to-white rounded-2xl shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">💰</div>
                <h3 class="text-xl font-bold text-brand-dark mb-3">Best Prices</h3>
                <p class="text-gray-600">
                    Competitive pricing with flexible financing options. 
                    Get the best value for your investment.
                </p>
            </div>

            <div class="text-center p-8 bg-gradient-to-br from-brand-light to-white rounded-2xl shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">🔧</div>
                <h3 class="text-xl font-bold text-brand-dark mb-3">After-Sales Support</h3>
                <p class="text-gray-600">
                    Comprehensive warranty and maintenance services. 
                    We're here for you every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-brand-red to-brand-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Go Electric?</h2>
        <p class="text-xl mb-8">Book a test drive today and experience the future of mobility</p>
        <a href="/contact" class="bg-white text-brand-red px-10 py-4 rounded-lg font-bold hover:bg-brand-pink hover:text-white transition inline-block shadow-xl">
            Book Test Drive
        </a>
    </div>
</section>

@include('layouts.footer')