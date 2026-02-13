@include('layouts.header')

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold" style="color: #55080D;">Contact Messages</h1>
            <p class="text-gray-600 mt-2">View and manage customer inquiries</p>
        </div>

        <!-- Messages List -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead style="background-color: #F8D2D6;">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Phone</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Subject</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Message</th>
                            <th class="px-6 py-4 text-left text-sm font-bold" style="color: #55080D;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $message->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-semibold" style="color: #55080D;">{{ $message->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <a href="mailto:{{ $message->email }}" class="hover:opacity-70" style="color: #C2174F;">
                                        {{ $message->email }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <a href="tel:{{ $message->phone }}" class="hover:opacity-70" style="color: #C2174F;">
                                        {{ $message->phone }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold" style="color: #C2174F;">
                                    {{ $message->subject }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    {{ Str::limit($message->message, 50) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($message->is_read)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #95a5a6;">
                                            Read
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #E23030;">
                                            New
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                    <div class="text-5xl mb-4">📭</div>
                                    <p class="text-lg">No messages yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($messages->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>

    </div>
</section>

@include('layouts.footer')