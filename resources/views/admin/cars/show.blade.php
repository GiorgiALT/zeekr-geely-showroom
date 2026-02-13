@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <!-- Header with Actions -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold" style="color: #55080D;">{{ $car->brand }} {{ $car->model }}</h1>
                <p class="text-gray-600 mt-2">Detailed vehicle information</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.cars.edit', $car) }}" 
                   class="px-6 py-3 text-white font-bold rounded-lg shadow-lg hover:opacity-90 transition"
                   style="background-color: #C2174F;">
                    Edit Car
                </a>
                <a href="{{ route('admin.cars.index') }}" 
                   class="px-6 py-3 text-gray-700 font-bold rounded-lg border-2 border-gray-300 hover:bg-gray-50 transition">
                    Back to List
                </a>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            
            <!-- Car Image -->
            @if($car->main_image)
            <div class="w-full h-96 overflow-hidden">
                <img src="{{ asset('storage/' . $car->main_image) }}" 
                     alt="{{ $car->brand }} {{ $car->model }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            <!-- Car Details -->
            <div class="p-8">
                
                <!-- Action Buttons -->
                <div class="grid grid-cols-1 gap-2">
                    
                    <a href="{{ route('admin.cars.edit', $car) }}" 
                    class="text-center px-3 py-2 rounded-lg text-white font-semibold hover:opacity-90 transition"
                    style="background-color: #f39c12;">
                        Edit
                    </a>
                    
                </div>

                <!-- Price -->
                <div class="mb-8">
                    <p class="text-sm text-gray-600 font-semibold">Price</p>
                    <p class="text-4xl font-bold" style="color: #C2174F;">₾{{ number_format($car->price, 2) }}</p>
                </div>

                <!-- Specifications Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    
                    <!-- Year -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Year</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $car->year }}</p>
                    </div>

                    <!-- Color -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Color</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $car->color }}</p>
                    </div>

                    <!-- Mileage -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Mileage</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($car->mileage) }} km</p>
                    </div>

                    <!-- Fuel Type -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Fuel Type</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $car->fuel_type }}</p>
                    </div>

                    <!-- Transmission -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Transmission</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $car->transmission }}</p>
                    </div>

                    <!-- Brand -->
                    <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                        <p class="text-sm font-semibold mb-1" style="color: #55080D;">Brand</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $car->brand }}</p>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="border-t-2 pt-6" style="border-color: #F8D2D6;">
                    <h2 class="text-2xl font-bold mb-4" style="color: #55080D;">Description</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $car->description }}</p>
                </div>

                <!-- Timestamps -->
                <div class="mt-8 pt-6 border-t-2 grid grid-cols-1 md:grid-cols-2 gap-4" style="border-color: #F8D2D6;">
                    <div>
                        <p class="text-sm text-gray-600 font-semibold">Added on</p>
                        <p class="text-gray-800">{{ $car->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-semibold">Last updated</p>
                        <p class="text-gray-800">{{ $car->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                <!-- Delete Section -->
                <div class="mt-8 pt-6 border-t-2" style="border-color: #F8D2D6;">
                    <h3 class="text-lg font-bold mb-3" style="color: #E23030;">Danger Zone</h3>
                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this car? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition">
                            Delete This Car
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>

@include('layouts.footer')