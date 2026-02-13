@include('layouts.header')

<!-- Contact Hero Section -->
<section class="py-16 text-white" style="background: linear-gradient(135deg, #55080D 0%, #C2174F 100%);">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Get in Touch</h1>
        <p class="text-xl opacity-90">We're here to help you find your perfect electric vehicle</p>
    </div>
</section>

<!-- Contact Content -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 p-4 rounded-lg text-white text-center" style="background-color: #C2174F;">
                <p class="font-semibold">✓ {{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-3xl font-bold mb-6" style="color: #55080D;">Send Us a Message</h2>
                <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name (Hidden for logged-in users) -->
                @auth
                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                @else
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name *
                        </label>
                        <input type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none transition"
                            style="border-color: #F8D2D6;"
                            placeholder="John Doe">
                        @error('name')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>
                @endauth

                <!-- Email (Hidden for logged-in users) -->
                @auth
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                @else
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address *
                        </label>
                        <input type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none transition"
                            style="border-color: #F8D2D6;"
                            placeholder="john@example.com">
                        @error('email')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>
                @endauth

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone Number *
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               required
                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none transition"
                               style="border-color: #F8D2D6;"
                               placeholder="+995 555 123 456">
                        @error('phone')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                            Subject *
                        </label>
                        <select id="subject" 
                                name="subject" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none transition"
                                style="border-color: #F8D2D6;">
                            <option value="">Select a subject</option>
                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="Test Drive Request" {{ old('subject') == 'Test Drive Request' ? 'selected' : '' }}>Test Drive Request</option>
                            <option value="Purchase Inquiry" {{ old('subject') == 'Purchase Inquiry' ? 'selected' : '' }}>Purchase Inquiry</option>
                            <option value="Service & Support" {{ old('subject') == 'Service & Support' ? 'selected' : '' }}>Service & Support</option>
                            <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('subject')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                            Your Message *
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="{{ auth()->check() ? '20' : '8' }}" 
                                  required
                                  class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none transition"
                                  style="border-color: #F8D2D6;"
                                  placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-sm mt-1" style="color: #E23030;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full text-white font-bold py-4 rounded-lg shadow-lg hover:opacity-90 transition"
                            style="background-color: #C2174F;">
                        Send Message 📧
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                
                <!-- Contact Cards -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold mb-6" style="color: #55080D;">Contact Information</h3>
                    
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start gap-4">
                            <div class="text-4xl">📍</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1" style="color: #C2174F;">Visit Us</h4>
                                <p class="text-gray-600">123 Rustaveli Avenue</p>
                                <p class="text-gray-600">Tbilisi, Georgia</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4">
                            <div class="text-4xl">📞</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1" style="color: #C2174F;">Call Us</h4>
                                <a href="tel:+995555123456" class="text-gray-600 hover:opacity-70 transition">
                                    +995 555 123 456
                                </a>
                                <p class="text-sm text-gray-500 mt-1">Mon-Fri: 9:00 AM - 7:00 PM</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div class="text-4xl">✉️</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1" style="color: #C2174F;">Email Us</h4>
                                <a href="mailto:info@zeekrgeely.ge" class="text-gray-600 hover:opacity-70 transition">
                                    info@zeekrgeely.ge
                                </a>
                                <p class="text-sm text-gray-500 mt-1">We'll respond within 24 hours</p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start gap-4">
                            <div class="text-4xl">💬</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1" style="color: #C2174F;">WhatsApp</h4>
                                <a href="https://wa.me/995555123456" target="_blank" class="text-gray-600 hover:opacity-70 transition">
                                    Chat with us instantly
                                </a>
                                <p class="text-sm text-gray-500 mt-1">Available 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Opening Hours -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold mb-6" style="color: #55080D;">Opening Hours</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-semibold">Monday - Friday</span>
                            <span class="font-bold" style="color: #C2174F;">9:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-semibold">Saturday</span>
                            <span class="font-bold" style="color: #C2174F;">10:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-semibold">Sunday</span>
                            <span class="font-bold text-gray-500">Closed</span>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold mb-6" style="color: #55080D;">Follow Us</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:opacity-70 transition" style="background-color: #F8D2D6;">
                            <span class="text-2xl">📘</span>
                            <span class="font-semibold" style="color: #55080D;">Facebook</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:opacity-70 transition" style="background-color: #F8D2D6;">
                            <span class="text-2xl">📷</span>
                            <span class="font-semibold" style="color: #55080D;">Instagram</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:opacity-70 transition" style="background-color: #F8D2D6;">
                            <span class="text-2xl">🎵</span>
                            <span class="font-semibold" style="color: #55080D;">TikTok</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:opacity-70 transition" style="background-color: #F8D2D6;">
                            <span class="text-2xl">💼</span>
                            <span class="font-semibold" style="color: #55080D;">LinkedIn</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Map -->
        <div class="mt-12 bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6 text-white" style="background-color: #C2174F;">
                <h3 class="text-2xl font-bold">Find Us on the Map</h3>
                <p class="opacity-90 mt-1">Visit our showroom and explore our collection in person</p>
            </div>
            <div class="h-96">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2977.838156740433!2d44.776109777829355!3d41.72401107504527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404472da123b4ea7%3A0x50e3f823441705df!2zNzcg4YOb4YOU4YOg4YOQ4YORIOGDmeGDneGDoeGDouGDkOGDleGDkOGDoSDhg6Xhg6Phg6nhg5AsIOGDl-GDkeGDmOGDmuGDmOGDoeGDmA!5e0!3m2!1ska!2sge!4v1770985133900!5m2!1ska!2sge" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</section>

<!-- CTA Section -->
<section class="py-16 text-white text-center" style="background-color: #55080D;">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Ready to Experience Electric?</h2>
        <p class="text-xl mb-8 opacity-90">Book a test drive and feel the future of mobility</p>
        <a href="/cars" class="inline-block px-10 py-4 rounded-lg font-bold shadow-lg hover:opacity-90 transition" style="background-color: #E23030;">
            Browse Cars
        </a>
    </div>
</section>

@include('layouts.footer')