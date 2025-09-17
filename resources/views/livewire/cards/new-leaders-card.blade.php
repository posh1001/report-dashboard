<div wire:poll.10s
     class="bg-gradient-to-r from-orange-500 to-yellow-400 text-white rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">

    <div>
        <p class="text-sm font-medium opacity-90">Total New Leaders</p>

        <!-- Loading shimmer -->
        <div wire:loading wire:target="$refresh" class="animate-pulse h-8 w-20 bg-white/30 rounded-md mt-2"></div>

        <!-- Live value -->
        <h2 wire:loading.remove wire:target="$refresh"
            class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2">
            {{ $totalNewLeaders }}
        </h2>
    </div>

    <div class="bg-white/20 p-2 sm:p-3 rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m3-4a4 4 0 100-8 4 4 0 000 8zm6 4a4 4 0 100-8 4 4 0 000 8z" />
        </svg>
    </div>
</div>
