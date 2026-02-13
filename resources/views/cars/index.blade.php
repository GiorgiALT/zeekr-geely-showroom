@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-brand-dark mb-4">Our Premium Collection</h1>
            <p class="text-gray-600 text-lg">Browse through our selection of Zeekr & Geely electric vehicles</p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('cars.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                
                <!-- Brand Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                    <select name="brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-brand-red focus:outline-none">
                        <option value="">All Brands</option>
                        <option value="Zeekr" {{ request('brand') == 'Zeekr' ? 'selected' : '' }}>Zeekr</option>
                        <option value="Geely" {{ request('brand') == 'Geely' ? 'selected' : '' }}>Geely</option>
                    </select>
                </div>

                <!-- Fuel Type Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Fuel Type</label>
                    <select name="fuel_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-brand-red focus:outline-none">
                        <option value="">All Types</option>
                        <option value="Electric" {{ request('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="Petrol" {{ request('fuel_type') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                    </select>
                </div>

                <!-- Price Range -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Max Price</label>
                    <select name="max_price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-brand-red focus:outline-none">
                        <option value="">Any Price</option>
                        <option value="50000" {{ request('max_price') == '50000' ? 'selected' : '' }}>Up to ₾50,000</option>
                        <option value="100000" {{ request('max_price') == '100000' ? 'selected' : '' }}>Up to ₾100,000</option>
                        <option value="150000" {{ request('max_price') == '150000' ? 'selected' : '' }}>Up to ₾150,000</option>
                        <option value="200000" {{ request('max_price') == '200000' ? 'selected' : '' }}>Up to ₾200,000</option>
                    </select>
                </div>

                <!-- Search Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-brand-red text-white px-6 py-2 rounded-lg hover:bg-brand-dark transition font-semibold">
                        🔍 Filter Cars
                    </button>
                </div>
            </form>

            @if(request()->hasAny(['brand', 'fuel_type', 'max_price']))
                <div class="mt-4">
                    <a href="{{ route('cars.index') }}" class="text-brand-red hover:text-brand-dark text-sm font-semibold">
                        ✕ Clear Filters
                    </a>
                </div>
            @endif
        </div>

        <!-- Cars Count -->
        <div class="mb-6">
            <p class="text-gray-600">Showing <span class="font-bold text-brand-red">{{ $cars->total() }}</span> vehicles</p>
        </div>

        <!-- Cars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $car)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                    <!-- Car Image -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $car->main_image) }}" 
                             alt="{{ $car->brand }} {{ $car->model }}" 
                             class="w-full h-64 object-cover">
                        
                        <!-- Status Badge -->
                        @if($car->status === 'available')
                            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                ✓ Available
                            </span>
                        @elseif($car->status === 'reserved')
                            <span class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                ⏳ Reserved
                            </span>
                        @else
                            <span class="absolute top-4 right-4 bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                ✕ Sold
                            </span>
                        @endif

                        <!-- Featured Badge -->
                        @if($car->is_featured)
                            <span class="absolute top-4 left-4 bg-brand-red text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                ⭐ Featured
                            </span>
                        @endif
                    </div>
                    
                    <!-- Car Details -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-bold text-brand-red uppercase tracking-wide">{{ $car->brand }}</span>
                            <span class="text-sm text-gray-500 font-semibold">{{ $car->year }}</span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $car->model }}</h3>
                        
                        <!-- Car Specs -->
                        <div class="grid grid-cols-2 gap-3 text-sm text-gray-600 mb-4">
                            <div class="flex items-center gap-2">
                                <span>⚡</span>
                                <span>{{ $car->fuel_type }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span>🔧</span>
                                <span>{{ $car->transmission }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span>🎨</span>
                                <span>{{ $car->color }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span>📏</span>
                                <span>{{ number_format($car->mileage) }} km</span>
                            </div>
                        </div>
                        
                        <!-- Price and Action -->
                        <div class="flex items-center justify-between pt-4 border-t">
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Starting from</div>
                                <div class="text-3xl font-bold text-brand-red">
                                    {{ $car->formatted_price }}
                                </div>
                            </div>
                            <a href="{{ route('cars.show', $car) }}" 
                               class="bg-brand-red text-white px-6 py-3 rounded-lg hover:bg-brand-dark transition font-semibold shadow-md">
                                View →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16">
                    <div class="text-6xl mb-4">🚗</div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Cars Found</h3>
                    <p class="text-gray-500 mb-6">Try adjusting your filters or check back later</p>
                    <a href="{{ route('cars.index') }}" class="bg-brand-red text-white px-8 py-3 rounded-lg hover:bg-brand-dark transition inline-block">
                        View All Cars
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($cars->hasPages())
            <div class="mt-12">
                {{ $cars->links() }}
            </div>
        @endif

    </div>
</section>

@include('layouts.footer')