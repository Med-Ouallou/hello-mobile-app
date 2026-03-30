<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Global Explorer')</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased" x-data="{ mobileMenuOpen: false }">
    <!-- Desktop Top Navigation -->
    <nav class="hidden lg:block bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600 tracking-tight">Global Explorer</span>
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="{{ request()->is('/') ? 'bg-blue-50 text-blue-700' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="/countries" class="{{ request()->is('countries') ? 'bg-blue-50 text-blue-700' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">Countries</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Mobile Hamburger Button -->
    <button 
        @click="mobileMenuOpen = !mobileMenuOpen"
        class="lg:hidden fixed top-4 right-4 z-50 p-2 rounded-lg bg-white shadow-lg border border-gray-200 text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Mobile Drawer Backdrop -->
    <div 
        x-show="mobileMenuOpen"
        @click="mobileMenuOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="lg:hidden fixed inset-0 z-40 bg-black bg-opacity-50"
        style="display: none;">
    </div>

    <!-- Mobile Drawer -->
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transform transition ease-in-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="lg:hidden fixed top-0 right-0 bottom-0 w-72 z-50 bg-white shadow-xl overflow-y-auto"
        style="display: none;">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-bold text-gray-900">Menu</h2>
                <button @click="mobileMenuOpen = false" class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <nav class="space-y-2">
                <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('/') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Home</span>
                </a>
                
                <a href="/countries" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('countries') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Countries</span>
                </a>
            </nav>
            
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-sm text-gray-500 font-medium">Global Explorer</p>
                <p class="text-xs text-gray-400 mt-1">Explore countries worldwide</p>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
