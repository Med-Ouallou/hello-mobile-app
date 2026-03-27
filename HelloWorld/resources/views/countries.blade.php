@extends('layouts.app')

@section('title', 'Global Explorer - Countries')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="countriesApp()" x-init="fetchCountries()">
        <header class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Global Explorer</h1>
                <p class="mt-2 text-lg text-gray-600">Discover information about countries around the world.</p>
            </div>
            <div class="relative max-w-md w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" x-model="search" placeholder="Search countries..." 
                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
            </div>
        </header>

        <!-- Loading State -->
        <div x-show="loading" class="flex flex-col items-center justify-center py-24 gap-4">
            <div class="w-12 h-12 border-4 border-blue-200 border-t-blue-600 rounded-full animate-spin"></div>
            <p class="text-gray-500 font-medium">Fetching global data...</p>
        </div>

        <!-- Grid -->
        <div x-show="!loading" id="countriesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <template x-for="country in filteredCountries" :key="country.name.common">
                <div class="country-card group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col">
                    <div class="relative h-48 overflow-hidden bg-gray-100">
                        <img :src="country.flags.svg || country.flags.png" 
                             :alt="'Flag of ' + country.name.common"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             loading="lazy">
                        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-xl font-bold text-gray-900 mb-4" x-text="country.name.common"></h2>
                        <div class="space-y-3 text-sm text-gray-600 flex-1">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">Population:</span>
                                <span x-text="new Intl.NumberFormat().format(country.population)"></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">Region:</span>
                                <span x-text="country.region || 'N/A'"></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">Capital:</span>
                                <span x-text="country.capital?.length ? country.capital[0] : 'N/A'"></span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <button class="w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold rounded-lg transition-colors duration-200">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- No Results -->
        <div x-show="!loading && filteredCountries.length === 0" id="noResults" class="py-24 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No countries found</h3>
            <p class="mt-1 text-gray-500">Try adjusting your search terms.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function countriesApp() {
            return {
                countries: [],
                search: '',
                loading: true,
                
                async fetchCountries() {
                    this.loading = true;
                    try {
                        const response = await fetch('https://restcountries.com/v3.1/all?fields=name,flags,population,region,capital');
                        if (!response.ok) throw new Error('Network response was not ok');
                        const data = await response.json();
                        this.countries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                    } catch (error) {
                        console.error('Fetch error:', error);
                    } finally {
                        this.loading = false;
                    }
                },

                get filteredCountries() {
                    if (this.search === '') {
                        return this.countries;
                    }
                    const searchTerm = this.search.toLowerCase();
                    return this.countries.filter(c => 
                        c.name.common.toLowerCase().includes(searchTerm)
                    );
                }
            }
        }
    </script>
@endpush
