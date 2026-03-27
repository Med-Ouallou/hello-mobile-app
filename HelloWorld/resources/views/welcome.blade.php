@extends('layouts.app')

@section('title', 'Welcome - Global Explorer')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600 px-4">
    <div class="text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 drop-shadow-lg">
            Hello World!
        </h1>
        <p class="text-xl text-blue-100 mb-10 max-w-lg mx-auto leading-relaxed">
            Welcome to Global Explorer. Start your journey by exploring countries from all over the world.
        </p>
        <a href="/countries" class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-bold rounded-xl shadow-xl hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 active:scale-95">
            Explore Countries
            <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</div>
@endsection
