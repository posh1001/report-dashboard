<nav x-data="{ open: false }" class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img class="h-10 w-10 rounded-full" src="/images/celz5-logo.png" alt="Logo">
                <span class="text-xl font-bold text-indigo-600">Report Dashboard</span>
            </div>

            <!-- Desktop Right Section -->
            <div class="hidden md:flex items-center space-x-8">
                @php
                    $userInitial = strtoupper(substr(auth()->user()->name ?? 'U', 0, 1));
                @endphp
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold text-lg uppercase">
                    {{ $userInitial }}
                </div>

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- User Badge -->
            <div class="flex items-center space-x-3 px-4 py-2">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold text-lg uppercase">
                    {{ $userInitial }}
                </div>
                <span class="text-gray-700 font-semibold">{{ auth()->user()->name ?? 'User' }}</span>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="/logout" class="px-4">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center space-x-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>
