<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex items-center justify-center">

    <!-- Login Card -->
    <div class="max-w-md w-full bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-2xl transition-all duration-300 hover:shadow-3xl">
        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center mb-8">Admin Login</h2>

        <!-- Error Messages -->
        @if ($errors->any() && !$errors->has('username'))
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg border border-red-200">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf

            <!-- Username Field -->
            <div class="relative">
                <input type="text" name="username" value="{{ old('username') }}" required
                    class="peer w-full pl-10 pr-3 py-3 border {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }} dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Username">
                <label
                    class="absolute left-10 top-3 text-gray-400 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-sm peer-focus:-top-2 peer-focus:text-indigo-600 peer-focus:text-xs">
                    Username
                </label>
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804zM12 14v-4m0 0l-2 2m2-2l2 2" />
                    </svg>
                </span>
                @error('username')
                    <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="relative">
                <input type="password" name="password" required
                    class="peer w-full pl-10 pr-3 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Password">
                <label
                    class="absolute left-10 top-3 text-gray-400 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-sm peer-focus:-top-2 peer-focus:text-indigo-600 peer-focus:text-xs">
                    Password
                </label>
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <!-- Lock Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.657 0 3 1.343 3 3v3H9v-3c0-1.657 1.343-3 3-3zM12 7a4 4 0 00-4 4v1h8V11a4 4 0 00-4-4z" />
                    </svg>
                </span>
                @error('password')
                    <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-2xl shadow-lg transition-all duration-200 transform hover:scale-105">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-gray-500 dark:text-gray-400 text-sm">
            &copy; {{ date('Y') }} CE Lagos Zone 5. All rights reserved.
        </p>
    </div>
</body>
</html>
