@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold" style="color: #55080D;">Manage Cars</h1>
                <p class="text-gray-600 mt-2">View, edit, and manage all vehicles in your inventory</p>
            </div>
            <a href="{{ route('admin.cars.create') }}" 
               class="px-6 py-3 rounded-lg text-white font-bold shadow-lg hover:opacity-90 transition bg-green-500 border-gray-400 border-2">
                + Add New Car
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg text-white" style="background-color: #C2174F;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Cars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($cars as $car)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                    
                    <!-- Car Image -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $car->main_image) }}" 
                             alt="{{ $car->brand }} {{ $car->model }}" 
                             class="w-full h-48 object-cover">
                        
                        <!-- Status Badge -->
                        @if($car->status === 'available')
                            <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #2ecc71;">
                                Available
                            </span>
                        @elseif($car->status === 'reserved')
                            <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #f39c12;">
                                Reserved
                            </span>
                        @else
                            <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #95a5a6;">
                                Sold
                            </span>
                        @endif

                        @if($car->is_featured)
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #E23030;">
                                ⭐ Featured
                            </span>
                        @endif
                    </div>

                    <!-- Car Details -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-bold uppercase" style="color: #C2174F;">{{ $car->brand }}</span>
                            <span class="text-sm text-gray-500">{{ $car->year }}</span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $car->model }}</h3>
                        
                        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-4">
                            <div>⚡ {{ $car->fuel_type }}</div>
                            <div>🔧 {{ $car->transmission }}</div>
                            <div>🎨 {{ $car->color }}</div>
                            <div>📏 {{ number_format($car->mileage) }} km</div>
                        </div>
                        
                        <div class="text-2xl font-bold mb-4" style="color: #C2174F;">
                            {{ $car->formatted_price }}
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('admin.cars.show', $car) }}" 
                            class="flex-1 text-center px-3 py-2 rounded-lg text-white font-semibold hover:opacity-90 transition"
                            style="background-color: #55080D;">
                                View
                            </a>
                            <a href="{{ route('admin.cars.edit', $car) }}" 
                            class="flex-1 text-center px-3 py-2 rounded-lg text-white font-semibold hover:opacity-90 transition"
                            style="background-color: #f39c12;">
                                Edit
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car) }}" 
                                method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this car?')"
                                class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full px-3 py-2 rounded-lg text-white font-semibold hover:opacity-90 transition"
                                        style="background-color: #E23030;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16">
                    <div class="text-6xl mb-4">🚗</div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Cars Yet</h3>
                    <p class="text-gray-500 mb-6">Start by adding your first vehicle</p>
                    <a href="{{ route('admin.cars.create') }}" 
                       class="inline-block px-8 py-3 rounded-lg text-white font-bold shadow-lg hover:opacity-90 transition"
                       style="background-color: #C2174F;">
                        + Add First Car
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($cars->hasPages())
            <div class="mt-8">
                {{ $cars->links() }}
            </div>
        @endif

    </div>
</section>

@include('layouts.footer')