<div wire:poll.5s
     class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">

    <div>
        <p class="text-sm font-medium opacity-90">Total Outreach Locations</p>

        <!-- Loading shimmer -->
        <div wire:loading wire:target="$refresh" class="animate-pulse h-8 w-20 bg-white/30 rounded-md mt-2"></div>

        <!-- Live value -->
        <h2 wire:loading.remove wire:target="$refresh"
            class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2">
            {{ $totalOutreachLocations }}
        </h2>
    </div>

    <div class="bg-white/20 p-2 sm:p-3 rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 20l-5.447-2.724A2 2 0 013 15.382V6.618a2 2 0 011.553-1.894L9 2m0 18l6-3m-6 3V2m6 15l5.447 2.724A2 2 0 0021 17.382V8.618a2 2 0 00-1.553-1.894L15 4m0 13V4m0 0L9 2" />
        </svg>
    </div>
</div>
