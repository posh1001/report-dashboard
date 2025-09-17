<div wire:poll.10s
     class="bg-white text-gray-900 rounded-2xl shadow-lg p-4 sm:p-6 flex items-center justify-between">

    <div>
        <p class="text-sm font-medium opacity-70">Total Foundation School</p>

        <!-- Live value with gradient color -->
        <h2 class="text-2xl sm:text-3xl font-extrabold mt-1 sm:mt-2 bg-clip-text text-transparent
                   bg-gradient-to-r from-green-500 to-emerald-400 transition-all duration-300">
            {{ $totalFoundationSchool }}
        </h2>
    </div>

    <div class="p-2 sm:p-3 rounded-xl bg-white shadow flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 sm:w-8 h-6 sm:h-8"
             fill="none" viewBox="0 0 24 24" stroke="url(#greenGradient)">
            <defs>
                <linearGradient id="greenGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#22c55e"/> <!-- green-500 -->
                    <stop offset="100%" stop-color="#10b981"/> <!-- emerald-400 -->
                </linearGradient>
            </defs>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m-9 4h12a2 2 0 002-2V8a2 2 0 00-2-2h-3l-1-2H10L9 6H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
    </div>
</div>
