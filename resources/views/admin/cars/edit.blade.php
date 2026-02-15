@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold" style="color: #f39c12;">Edit Car</h1>
            <p class="text-gray-600 mt-2">Update the details of {{ $car->brand }} {{ $car->model }}</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <form method="POST" action="{{ route('admin.cars.update', $car) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Brand -->
                    <div>
                        <label for="brand" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Brand *
                        </label>
                        <select id="brand" name="brand" required
                                class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                                style="border-color: #F8D2D6;">
                            <option value="">Select Brand</option>
                            <option value="Zeekr" {{ old('brand', $car->brand) == 'Zeekr' ? 'selected' : '' }}>Zeekr</option>
                            <option value="Geely" {{ old('brand', $car->brand) == 'Geely' ? 'selected' : '' }}>Geely</option>
                        </select>
                        @error('brand')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Model -->
                    <div>
                        <label for="model" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Model *
                        </label>
                        <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}" required
                               class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                               style="border-color: #F8D2D6;"
                               placeholder="e.g., 001, Coolray">
                        @error('model')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Year *
                        </label>
                        <input type="number" id="year" name="year" value="{{ old('year', $car->year) }}" 
                               min="2000" max="{{ date('Y') + 1 }}" required
                               class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                               style="border-color: #F8D2D6;">
                        @error('year')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Price (₾) *
                        </label>
                        <input type="number" id="price" name="price" value="{{ old('price', $car->price) }}" 
                               min="0" step="0.01" required
                               class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                               style="border-color: #F8D2D6;"
                               placeholder="50000">
                        @error('price')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Color -->
                    <div>
                        <label for="color" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Color *
                        </label>
                        <input type="text" id="color" name="color" value="{{ old('color', $car->color) }}" required
                               class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                               style="border-color: #F8D2D6;"
                               placeholder="e.g., White, Black, Silver">
                        @error('color')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mileage -->
                    <div>
                        <label for="mileage" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Mileage (km) *
                        </label>
                        <input type="number" id="mileage" name="mileage" value="{{ old('mileage', $car->mileage) }}" 
                               min="0" required
                               class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                               style="border-color: #F8D2D6;"
                               placeholder="0">
                        @error('mileage')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fuel Type -->
                    <div>
                        <label for="fuel_type" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Fuel Type *
                        </label>
                        <select id="fuel_type" name="fuel_type" required
                                class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                                style="border-color: #F8D2D6;">
                            <option value="">Select Fuel Type</option>
                            <option value="Electric" {{ old('fuel_type', $car->fuel_type) == 'Electric' ? 'selected' : '' }}>Electric</option>
                            <option value="Hybrid" {{ old('fuel_type', $car->fuel_type) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="Petrol" {{ old('fuel_type', $car->fuel_type) == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                            <option value="Diesel" {{ old('fuel_type', $car->fuel_type) == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        </select>
                        @error('fuel_type')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Transmission -->
                    <div>
                        <label for="transmission" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Transmission *
                        </label>
                        <select id="transmission" name="transmission" required
                                class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                                style="border-color: #F8D2D6;">
                            <option value="">Select Transmission</option>
                            <option value="Automatic" {{ old('transmission', $car->transmission) == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="Manual" {{ old('transmission', $car->transmission) == 'Manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                        @error('transmission')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                            Status *
                        </label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                                style="border-color: #F8D2D6;">
                            <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="reserved" {{ old('status', $car->status) == 'reserved' ? 'selected' : '' }}>Reserved</option>
                            <option value="sold" {{ old('status', $car->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                        </select>
                        @error('status')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div>
                        <label class="flex items-center pt-8">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" 
                                   {{ old('is_featured', $car->is_featured) ? 'checked' : '' }}
                                   class="mr-3 w-5 h-5">
                            <span class="text-sm font-semibold" style="color: #55080D;">
                                Mark as Featured Car
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                        Description *
                    </label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                              style="border-color: #F8D2D6;"
                              placeholder="Enter detailed description of the car...">{{ old('description', $car->description) }}</textarea>
                    @error('description')
                        <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($car->main_image)
                <div class="mt-6">
                    <label class="block text-sm font-semibold mb-2" style="color: #55080D;">
                        Current Image
                    </label>
                    <img src="{{ asset('storage/' . $car->main_image) }}" 
                         alt="{{ $car->brand }} {{ $car->model }}"
                         class="w-48 h-32 object-cover rounded-lg border-2"
                         style="border-color: #F8D2D6;">
                </div>
                @endif

                <!-- Main Image -->
                <div class="mt-6">
                    <label for="main_image" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                        Update Main Image (Optional - JPEG, PNG, JPG - Max 2MB)
                    </label>
                    <input type="file" id="main_image" name="main_image" accept="image/*"
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none"
                           style="border-color: #F8D2D6;">
                    @error('main_image')
                        <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Leave empty to keep the current image</p>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 mt-8">
                    <button type="submit" 
                            class="flex-1 text-white font-bold py-3 rounded-lg shadow-lg hover:opacity-90 transition"
                            style="background-color: #C2174F;">
                        Update Car
                    </button>
                    <a href="{{ route('admin.cars.index') }}" 
                       class="flex-1 text-center text-gray-700 font-bold py-3 rounded-lg border-2 border-gray-300 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>

@include('layouts.footer')