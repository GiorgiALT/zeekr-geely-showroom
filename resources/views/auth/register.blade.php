@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            
            <!-- Register Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                
                <!-- Header -->
                <div class="text-white p-8 text-center" style="background: linear-gradient(135deg, #55080D 0%, #C2174F 100%);">
                    <div class="text-5xl mb-4">🎉</div>
                    <h2 class="text-3xl font-bold mb-2">Create Account</h2>
                    <p class="opacity-90">Join the electric revolution</p>
                </div>

                <!-- Form -->
                <div class="p-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                                Full Name
                            </label>
                            <input id="name" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autofocus
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none transition"
                                   style="border-color: #F8D2D6;"
                                   placeholder="John Doe">
                            @error('name')
                                <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                                Email Address
                            </label>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none transition"
                                   style="border-color: #F8D2D6;"
                                   placeholder="your@email.com">
                            @error('email')
                                <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                                Password
                            </label>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none transition"
                                   style="border-color: #F8D2D6;"
                                   placeholder="Minimum 8 characters">
                            @error('password')
                                <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-sm font-semibold mb-2" style="color: #55080D;">
                                Confirm Password
                            </label>
                            <input id="password_confirmation" 
                                   type="password" 
                                   name="password_confirmation" 
                                   required
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none transition"
                                   style="border-color: #F8D2D6;"
                                   placeholder="Re-enter password">
                            @error('password_confirmation')
                                <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full text-white font-bold py-3 rounded-lg shadow-lg hover:opacity-90 transition"
                                style="background-color: #C2174F;">
                            Create Account
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600 text-sm">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="font-semibold hover:opacity-70" style="color: #C2174F;">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="/" class="text-gray-600 hover:opacity-70 text-sm">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')