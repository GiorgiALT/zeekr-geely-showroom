@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            
            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                
                <!-- Header -->
                <div class="text-white p-8 text-center" style="background: linear-gradient(135deg, #C2174F 0%, #55080D 100%);">
                    <div class="text-5xl mb-4">🔐</div>
                    <h2 class="text-3xl font-bold mb-2">Welcome Back</h2>
                    <p class="opacity-90">Login to your account</p>
                </div>

                <!-- Form -->
                <div class="p-8">
                    
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-3 rounded-lg text-white text-center" style="background-color: #C2174F;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                   autofocus
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
                                   placeholder="Enter your password">
                            @error('password')
                                <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="mr-2">
                                <span class="text-sm text-gray-700">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm hover:opacity-70" style="color: #C2174F;">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full text-white font-bold py-3 rounded-lg shadow-lg hover:opacity-90 transition"
                                style="background-color: #C2174F;">
                            Sign In
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600 text-sm">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="font-semibold hover:opacity-70" style="color: #C2174F;">
                                Create Account
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