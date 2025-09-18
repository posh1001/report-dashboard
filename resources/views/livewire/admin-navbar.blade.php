<nav x-data="{ open: false }" class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <span class="text-xl font-bold text-indigo-600">Report Dashboard</span>
            </div>

            <!-- Search Bar (Desktop Only) -->
            {{-- @livewire('search-reports') --}}


            <!-- Right Section -->
            <div class="hidden md:flex items-center space-x-8">

                <!-- Notification Bell -->
                <livewire:update-notification />


                <div x-data="{ open: false }" class="relative mb-1">
                    <!-- Button -->
                    <button @click="open = !open"
                        class="px-4 py-2 bg-indigo-600 text-white text-sm rounded-lg shadow hover:bg-indigo-700 focus:outline-none">
                        Export Reports
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="{{ route('reports.export.excel') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Export as Excel</a>
                        <a href="{{ route('reports.export.csv') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Export as CSV</a>
                    </div>
                </div>


                <!-- User Initial Badge -->
                {{-- <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold text-lg uppercase">
                    {{ $userInitial }}
                </div> --}}

                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" type="button"
                    class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden bg-white shadow-md">
        <div class="px-4 pt-4 pb-6 space-y-4">
            <div class="flex items-center space-x-4">
                <!-- Notification Bell -->
                <livewire:update-notification />

                <!-- User Initial Badge -->
                {{-- <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold text-lg uppercase">
                    {{ $userInitial }}
                </div> --}}
            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
