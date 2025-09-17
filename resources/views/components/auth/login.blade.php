@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg space-y-6">
        <div class="flex gap-8">
            <img src="/images/celz5-logo.png" alt="logo" style="width: 50px;">
        <h2 class="text-blue-400 text-lg font-bold">Post program Report Portal</h2>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center">Login</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/" class="mt-6 space-y-6">
            @csrf

            <!-- Email -->
            <div class="flex items-center border @error('email') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 dark:bg-gray-700">
                <span class="px-3 text-gray-400 dark:text-gray-300">
                    <!-- Classic email icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h2a2 2 0 012 2v6H4v-6a2 2 0 012-2h2m4-8v8M12 12L4 6h16l-8 6z" />
                    </svg>
                </span>
                <input type="email" name="email" placeholder="Email" required
                    value="{{ old('email') }}"
                    class="w-full px-3 py-2 bg-transparent focus:outline-none dark:text-white">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition duration-300">
                Login
            </button>

            <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Sign Up</a>
            </p>
        </form>
    </div>
</div>
@endsection
