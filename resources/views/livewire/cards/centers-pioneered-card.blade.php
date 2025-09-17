<div wire:poll.10s
     class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">
    <div>
        <p class="text-sm font-medium opacity-90">Centers Pioneered</p>
        <div wire:loading wire:target="$refresh" class="animate-pulse h-8 w-20 bg-white/30 rounded-md mt-2"></div>
        <h2 wire:loading.remove wire:target="$refresh"
            class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2">
            {{ $centers_pioneered }}
        </h2>
    </div>
    <div class="bg-white/20 p-2 sm:p-3 rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
        </svg>
    </div>
</div>
