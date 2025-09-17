<div wire:poll.10s="loadData"
     class="bg-white text-gray-900 rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">

    <div>
        <p class="text-sm font-medium opacity-70">Total Cell Pioneered</p>

        <!-- Live value with gradient color -->
        <h2 class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2 bg-clip-text text-transparent
                   bg-gradient-to-r from-purple-500 to-pink-500 transition-all duration-300">
            {{ $cellPioneered }}
        </h2>
    </div>

    <div class="p-2 sm:p-3 rounded-xl bg-white shadow flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 sm:w-8 h-6 sm:h-8 text-purple-600"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
        </svg>
    </div>
</div>
