<a href="/adventures/{{ $adventure->title }}" class="block bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
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