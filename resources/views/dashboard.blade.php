<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("Search for a Steam account") }}

                <!-- Add the form here -->
                <form action="{{ route('search.steamid') }}" method="GET" class="mt-6">
                    <div class="flex items-center space-x-4">
                        <input 
                            type="text" 
                            name="steamid" 
                            placeholder="Enter Steam ID" 
                            class="border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full sm:w-64"
                            required
                        />
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-blue-500 text-black rounded-lg hover:bg-blue-600"
                        >
                            Search
                        </button>
                    </div>
                </form>
                @if (session('searchResults'))
                    @php
                        $results = session('searchResults');
                    @endphp
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold">Search Results</h2>
                        <div class="mt-4">
                            <p><strong>Steam ID:</strong> {{ $results['steamid'] }}</p>
                            <p><strong>SteamID 64:</strong> {{ $results['steamID64'] }}</p>
                            <p><strong>Name:</strong> {{ $results['name'] }}</p>
                            <p><strong>Profile URL:</strong> <a href="{{ $results['profileUrl'] }}" target="_blank">{{ $results['profileUrl'] }}</a></p>
                            <p><strong>Creation Date:</strong> {{ $results['steamAccCreated'] }}</p>
                            <p><strong>Avatar:</strong></p>
                            <img src="{{ $results['avatar'] }}" alt="Avatar" class="w-128 h-128">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

</x-app-layout>
