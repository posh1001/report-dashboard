<div wire:poll.10s
     class="bg-white text-gray-900 rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">

    <div>
        <p class="text-sm font-medium opacity-70">Total New Churches Pioneered</p>

        <!-- Live value with blue gradient -->
        <h2 class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2 bg-clip-text text-transparent
                   bg-gradient-to-r from-blue-500 to-blue-700 transition-all duration-300">
            {{ $churchesPioneered }}
        </h2>
    </div>

    <div class="p-2 sm:p-3 rounded-xl bg-white shadow flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 sm:w-8 h-6 sm:h-8 text-blue-600"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 3v18m9-9H3" />
        </svg>
    </div>
</div>
