<x-layout>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen container mx-auto py-8">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold">Hi, {{ $user->name }}</h1>
                    <div class="space-x-2">
                        <a href="{{ route('chats') }}" class="bg-green-700 border-2 border-green-700 text-white px-6 py-3 rounded-full hover:text-green-500 hover:bg-white">Chats</a>
                        <a href="{{ route('profile.edit') }}" class="text-green-700 border-2 border-green-700 px-6 py-3 rounded-full">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Adventures Created by You</h2>
                @if ($user->adventures->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($user->adventures as $adventure)
                            <a href="{{ route('adventure', ['adventure' => $adventure]) }}" class="block bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                                <div class="p-4 flex-grow">
                                    <h3 class="text-xl font-semibold mb-2">{{ $adventure->title }}</h3>
                                    <p class="text-gray-700 mb-2">{{ Str::limit($adventure->description, 100) }}</p>
                                    <p class="text-gray-500">Location: {{ $adventure->location }}</p>
                                    <p class="text-gray-500">Date: {{ $adventure->date }}</p>
                                </div>
                                <div class="bg-green-500 p-2 rounded-b-lg mt-auto">
                                    <p class="text-white text-center">Explore!</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">You have not created any adventures.</p>
                @endif
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Adventures You've Joined</h2>
                @if ($user->participatedAdventures->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($user->participatedAdventures as $adventure)
                            <a href="{{ route('adventure', ['adventure' => $adventure]) }}" class="block bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                                <div class="p-4 flex-grow">
                                    <h3 class="text-xl font-semibold mb-2">{{ $adventure->title }}</h3>
                                    <p class="text-gray-700 mb-2">{{ Str::limit($adventure->description, 100) }}</p>
                                    <p class="text-gray-500">Location: {{ $adventure->location }}</p>
                                    <p class="text-gray-500">Date: {{ $adventure->date }}</p>
                                </div>
                                <div class="bg-green-500 p-2 rounded-b-lg mt-auto">
                                    <p class="text-white text-center">Explore!</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">You have not joined any adventures.</p>
                @endif
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Adventures You're Interested In</h2>
                @if ($user->interests->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($user->interests as $adventure)
                            <a href="{{ route('adventure', ['adventure' => $adventure->id]) }}" class="block bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                                <div class="p-4 flex-grow">
                                    <h3 class="text-xl font-semibold mb-2">{{ $adventure->title }}</h3>
                                    <p class="text-gray-700 mb-2">{{ Str::limit($adventure->description, 100) }}</p>
                                    <p class="text-gray-500">Location: {{ $adventure->location }}</p>
                                    <p class="text-gray-500">Date: {{ $adventure->date }}</p>
                                </div>
                                <div class="bg-green-500 p-2 rounded-b-lg mt-auto">
                                    <p class="text-white text-center">Explore!</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">You are not interested in any adventures.</p>
                @endif
            </div>
        </div>
    </body>
</x-layout>

