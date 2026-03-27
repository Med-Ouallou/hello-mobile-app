<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Global Explorer')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased pb-20 lg:pb-0">
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

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">
        <div class="flex justify-around items-center h-16">
            <a href="/" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->is('/') ? 'text-blue-600' : 'text-gray-400' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-[10px] font-medium uppercase tracking-wider">Home</span>
            </a>
            <a href="/countries" class="flex flex-col items-center justify-center w-full h-full space-y-1 {{ request()->is('countries') ? 'text-blue-600' : 'text-gray-400' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-[10px] font-medium uppercase tracking-wider">Countries</span>
            </a>
        </div>
    </nav>

    @stack('scripts')
</body>
</html>
