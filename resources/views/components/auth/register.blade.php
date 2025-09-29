@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">

    <!-- Flyer Card -->
    <div class="relative max-w-md w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-10 rounded-3xl shadow-2xl overflow-hidden">

        <!-- Decorative Blobs Inside Card -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-yellow-400/30 rounded-full blur-3xl"></div>

        <!-- Decorative Wave (on card) -->
        <div class="absolute top-0 left-0 w-full opacity-30">
            <svg class="w-full h-24 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="currentColor" fill-opacity="1" d="M0,192L48,186.7C96,181,192,171,288,170.7C384,171,480,181,576,197.3C672,213,768,235,864,218.7C960,203,1056,149,1152,117.3C1248,85,1344,75,1392,69.3L1440,64L1440,0L0,0Z"></path>
            </svg>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-6">

            <!-- Logo + Title -->
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/celz5-logo.png" alt="logo" class="w-16 drop-shadow-lg" style="border-radius: 5px;">
                <h2 class="text-2xl font-extrabold text-white tracking-wide">
                    Post Program Report Portal
                </h2>
            </div>

            <h2 class="text-3xl font-extrabold text-white">Create an Account</h2>

            <!-- Success -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Errors -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-lg">
                    <ul class="list-disc list-inside text-left">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-6">
                @csrf

                <!-- Group -->
                <div class="flex items-center border border-white/40 rounded-xl bg-white/20 backdrop-blur px-3">
                    <span class="text-white/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </span>
                    <input type="text" name="group" placeholder="Group" required
                        value="{{ old('group') }}"
                        class="w-full px-3 py-3 bg-transparent focus:outline-none text-white placeholder-white/60">
                </div>

                <!-- Full Name -->
                <div class="flex items-center border border-white/40 rounded-xl bg-white/20 backdrop-blur px-3">
                    <span class="text-white/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M12 12a5 5 0 100-10 5 5 0 000 10z" />
                        </svg>
                    </span>
                    <input type="text" name="name" placeholder="Full Name" required
                        value="{{ old('name') }}"
                        class="w-full px-3 py-3 bg-transparent focus:outline-none text-white placeholder-white/60">
                </div>

                <!-- Email -->
                <div class="flex items-center border border-white/40 rounded-xl bg-white/20 backdrop-blur px-3">
                    <span class="text-white/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h2a2 2 0 012 2v6H4v-6a2 2 0 012-2h2m4-8v8M12 12L4 6h16l-8 6z" />
                        </svg>
                    </span>
                    <input type="email" name="email" placeholder="Email" required
                        value="{{ old('email') }}"
                        class="w-full px-3 py-3 bg-transparent focus:outline-none text-white placeholder-white/60">
                </div>

                <!-- Password -->
                <div class="flex items-center border border-white/40 rounded-xl bg-white/20 backdrop-blur px-3">
                    <span class="text-white/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3 1.343-3 3v4h6v-4c0-1.657-1.343-3-3-3z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11V7a7 7 0 0114 0v4" />
                        </svg>
                    </span>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-3 py-3 bg-transparent focus:outline-none text-white placeholder-white/60">
                </div>

                <!-- Confirm Password -->
                <div class="flex items-center border border-white/40 rounded-xl bg-white/20 backdrop-blur px-3">
                    <span class="text-white/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3 1.343-3 3v4h6v-4c0-1.657-1.343-3-3-3z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11V7a7 7 0 0114 0v4" />
                        </svg>
                    </span>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                        class="w-full px-3 py-3 bg-transparent focus:outline-none text-white placeholder-white/60">
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 px-4 bg-white text-indigo-700 font-bold rounded-xl shadow-lg hover:bg-gray-100 transform hover:scale-105 transition duration-300">
                    Sign Up
                </button>

                <!-- Login Redirect -->
                <p class="text-sm text-white/90">
                    Already have an account?
                    <a href="{{ route('login') }}" class="underline font-semibold">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
