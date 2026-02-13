@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Dashboard Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-brand-dark mb-2">Admin Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{ auth()->user()->name }}! Here's your showroom overview.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            
            <!-- Total Cars -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-red hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">Total Cars</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['total_cars'] }}</p>
                    </div>
                    <div class="text-6xl">🚗</div>
                </div>
            </div>

            <!-- Available Cars -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">Available</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['available_cars'] }}</p>
                    </div>
                    <div class="text-6xl">✅</div>
                </div>
            </div>

            <!-- Sold Cars -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">Sold Cars</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['sold_cars'] }}</p>
                    </div>
                    <div class="text-6xl">💰</div>
                </div>
            </div>

            <!-- Total Customers -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">Customers</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['total_customers'] }}</p>
                    </div>
                    <div class="text-6xl">👥</div>
                </div>
            </div>

            <!-- Unread Messages -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">New Messages</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['unread_messages'] }}</p>
                    </div>
                    <div class="text-6xl">✉️</div>
                </div>
            </div>

            <!-- Pending Test Drives -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-accent hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold uppercase mb-2">Test Drives</p>
                        <p class="text-4xl font-bold text-brand-dark">{{ $stats['pending_test_drives'] }}</p>
                    </div>
                    <div class="text-6xl">📅</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
            <a href="{{ route('admin.cars.create') }}" class="bg-brand-red text-white p-6 rounded-xl shadow-md hover:bg-brand-dark transition text-center">
                <div class="text-4xl mb-3">➕</div>
                <p class="font-bold">Add New Car</p>
            </a>

            <a href="{{ route('admin.cars.index') }}" class="bg-white text-brand-dark p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-2 border-gray-200">
                <div class="text-4xl mb-3">📋</div>
                <p class="font-bold">Manage Cars</p>
            </a>

            <a href="{{ route('admin.messages') }}" class="bg-white text-brand-dark p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-2 border-gray-200">
                <div class="text-4xl mb-3">💬</div>
                <p class="font-bold">View Messages</p>
            </a>

            <a href="{{ route('admin.testdrives') }}" class="bg-white text-brand-dark p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-2 border-gray-200">
                <div class="text-4xl mb-3">🔑</div>
                <p class="font-bold">Test Drives</p>
            </a>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Recent Test Drives -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-brand-dark mb-4">Recent Test Drive Requests</h3>
                <div class="space-y-4">
                    @forelse($recentTestDrives as $testDrive)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">{{ $testDrive->customer_name }}</p>
                                <p class="text-sm text-gray-600">{{ $testDrive->car->brand }} {{ $testDrive->car->model }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $testDrive->preferred_date }} at {{ $testDrive->preferred_time }}</p>
                            </div>
                            @php
                                $statusClasses = match($testDrive->status) {
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'confirmed' => 'bg-green-100 text-green-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClasses }}">
                                {{ ucfirst($testDrive->status) }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No recent test drives</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Messages -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-brand-dark mb-4">Recent Contact Messages</h3>
                <div class="space-y-4">
                    @forelse($recentMessages as $message)
                        <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between mb-2">
                                <p class="font-semibold text-gray-800">{{ $message->name }}</p>
                                @if(!$message->is_read)
                                    <span class="px-2 py-1 bg-brand-red text-white rounded-full text-xs font-semibold">New</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mb-1">{{ $message->subject }}</p>
                            <p class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No recent messages</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</section>

@include('layouts.footer')