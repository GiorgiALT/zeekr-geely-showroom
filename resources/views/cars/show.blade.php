@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <!-- Breadcrumb -->
        <div class="mb-6">
            <a href="{{ route('cars.index') }}" class="text-gray-600 hover:text-gray-800">← Back to All Cars</a>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Left Column - Image -->
            <div>
                @if($car->main_image)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $car->main_image) }}" 
                         alt="{{ $car->brand }} {{ $car->model }}"
                         class="w-full h-[500px] object-cover">
                </div>
                @endif

                <!-- Status Badge -->
                <div class="mt-4">
                    @if($car->status == 'available')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                            ✓ Available Now
                        </span>
                    @elseif($car->status == 'reserved')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                            Reserved
                        </span>
                    @else
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800">
                            Sold
                        </span>
                    @endif

                    @if($car->is_featured)
                    <span class="ml-2 px-4 py-2 rounded-full text-sm font-bold bg-purple-100 text-purple-800">
                        ⭐ Featured
                    </span>
                    @endif
                </div>
            </div>

            <!-- Right Column - Details -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                
                <!-- Brand & Model -->
                <div class="mb-6">
                    <p class="text-sm font-bold uppercase mb-2" style="color: #C2174F;">{{ $car->brand }}</p>
                    <h1 class="text-4xl font-bold mb-2" style="color: #55080D;">{{ $car->model }}</h1>
                    <p class="text-gray-600">{{ $car->year }} Model</p>
                </div>

                <!-- Price -->
                <div class="mb-8 pb-8 border-b-2" style="border-color: #F8D2D6;">
                    <p class="text-sm text-gray-600 font-semibold mb-1">Price</p>
                    <p class="text-5xl font-bold" style="color: #C2174F;">₾{{ number_format($car->price, 2) }}</p>
                </div>

                <!-- Specifications -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold mb-4" style="color: #55080D;">Specifications</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                            <p class="text-xs text-gray-600 mb-1">Color</p>
                            <p class="font-bold text-gray-800">{{ $car->color }}</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                            <p class="text-xs text-gray-600 mb-1">Mileage</p>
                            <p class="font-bold text-gray-800">{{ number_format($car->mileage) }} km</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                            <p class="text-xs text-gray-600 mb-1">Fuel Type</p>
                            <p class="font-bold text-gray-800">{{ $car->fuel_type }}</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background-color: #FEF2F3;">
                            <p class="text-xs text-gray-600 mb-1">Transmission</p>
                            <p class="font-bold text-gray-800">{{ $car->transmission }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold mb-4" style="color: #55080D;">Description</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $car->description }}</p>
                </div>

                <!-- CTA Buttons -->
                <div class="space-y-3">
                    @if($car->status == 'available')
                    <button onclick="openTestDriveModal({{ $car->id }})" 
                            class="w-full py-4 rounded-lg text-white font-bold shadow-lg hover:opacity-90 transition"
                            style="background-color: #C2174F;">
                        Book a Test Drive
                    </button>
                    @endif
                    
                    <a href="{{ route('contact') }}" 
                       class="block w-full py-4 rounded-lg text-center font-bold border-2 hover:bg-gray-50 transition"
                       style="border-color: #C2174F; color: #C2174F;">
                        Contact Us About This Car
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@include('layouts.footer')

<!-- Test Drive Modal (if you have one) -->
<script>
function openTestDriveModal(carId) {
    // Add your modal logic here
    alert('Test drive booking for car ID: ' + carId);
}
</script>