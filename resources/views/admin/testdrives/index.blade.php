@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold" style="color: #55080D;">Test Drive Requests</h1>
            <p class="text-gray-600 mt-2">Manage customer test drive bookings</p>
        </div>

        <!-- Test Drives List -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead style="background-color: #F8D2D6;">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Contact</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Car</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Preferred Date/Time</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testDrives as $testDrive)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $testDrive->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold" style="color: #55080D;">{{ $testDrive->customer_name }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="space-y-1">
                                        <a href="mailto:{{ $testDrive->customer_email }}" class="block hover:opacity-70" style="color: #C2174F;">
                                            📧 {{ $testDrive->customer_email }}
                                        </a>
                                        <a href="tel:{{ $testDrive->customer_phone }}" class="block hover:opacity-70" style="color: #C2174F;">
                                            📞 {{ $testDrive->customer_phone }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold" style="color: #C2174F;">
                                        {{ $testDrive->car->brand }} {{ $testDrive->car->model }}
                                    </div>
                                    <div class="text-xs text-gray-500">{{ $testDrive->car->year }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="font-semibold text-gray-800">{{ $testDrive->preferred_date }}</div>
                                    <div class="text-gray-600">{{ $testDrive->preferred_time }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($testDrive->status === 'pending')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #f39c12;">
                                            Pending
                                        </span>
                                    @elseif($testDrive->status === 'confirmed')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #2ecc71;">
                                            Confirmed
                                        </span>
                                    @elseif($testDrive->status === 'completed')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #3498db;">
                                            Completed
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #95a5a6;">
                                            Cancelled
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    {{ $testDrive->notes ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                    <div class="text-5xl mb-4">📅</div>
                                    <p class="text-lg">No test drive requests yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($testDrives->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $testDrives->links() }}
                </div>
            @endif
        </div>

    </div>
</section>

@include('layouts.footer')