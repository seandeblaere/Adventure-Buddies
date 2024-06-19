<div class="w-full sm:w-auto rounded-lg bg-white shadow-md overflow-hidden transition duration-500 hover:bg-green-50 flex flex-col justify-between">
    <div class="relative h-64 overflow-hidden">
        <div class="bg-cover bg-center h-full w-full transition-transform duration-500 transform hover:scale-110" style="background-image: url('{{ $adventure->image_url }}');"></div>
    </div>
    <div class="p-4 flex-grow">
        <span class="text-gray-500">{{ $adventure->date }}</span>
    <div class="text-xl font-bold text-gray-900 mt-2">{{ $adventure->title }}</div>
        <p class="text-gray-600 mt-2 text-sm">
            Location: {{ $adventure->location }}<br>
            Capacity: {{ $adventure->capacity }}<br>
            Created by: {{ $adventure->creator->name }}
        </p>
        @if ($adventure->isFull())
            <span class="text-red-600 font-semibold text-lg mt-2">This adventure is full</span>
        @else
            <span class="text-green-600 font-semibold text-lg mt-2">Spaces available!</span>
        @endif
    </div>
    <div class=" flex justify-center">
        <a href="/adventures/{{ $adventure->title }}" class="inline-block mt-4 mb-4 px-8 py-2 text-white bg-green-500 rounded-full shadow-lg transform transition duration-300 ease-in-out hover:scale-105 text-lg">Explore!</a>
    </div>
</div>