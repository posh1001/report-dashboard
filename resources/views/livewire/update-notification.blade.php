<div class="relative" x-data="{ open: @entangle('showDropdown') }" wire:poll.5s="refreshReports">
    <!-- Notification Button -->
    <button wire:click="toggleDropdown"
            class="relative bg-gray-100 p-2 rounded-full hover:bg-gray-200 focus:outline-none">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a2 2 0 10-4 0v1.083A6 6 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m4 0v1a3 3 0 006 0v-1m-6 0H9"/>
        </svg>

        <!-- Badge -->
        @if($notifications > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                {{ $notifications }}
            </span>
        @endif
    </button>

    <!-- Dropdown -->
    <div x-show="open" x-transition @click.away="open = false"
         class="absolute right-0 mt-2 w-80 bg-white border rounded shadow-lg z-50">
        <div class="p-4 text-gray-700 font-semibold border-b">Notifications</div>
        <div class="max-h-60 overflow-y-auto">
            @forelse($currentReports as $report)
                <a href="{{ route('reports.show', $report->id) }}"
                   class="block p-3 hover:bg-gray-100 border-b cursor-pointer transition">
                    <p class="text-sm font-medium">{{ $report->title ?? 'New Report' }}</p>
                    <p class="text-xs text-gray-500">{{ $report->created_at->diffForHumans() }}</p>
                </a>
            @empty
                <div class="p-3 text-gray-500 text-sm">No new notifications.</div>
            @endforelse
        </div>
    </div>
</div>
