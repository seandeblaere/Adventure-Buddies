<x-layout>   
    <div class="min-h-screen container mx-auto py-8">
        <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg flex flex-wrap items-stretch">
            <div class="w-full lg:w-1/2 flex items-stretch rounded-l-lg">
                <div class="flex-grow p-6">
                    <h1 class="text-3xl font-bold mb-4">{{ $adventure->title }}</h1>
                    <p class="text-gray-700 mb-4">{{ $adventure->description }}</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="text-gray-500">Location:</div>
                        <div>{{ $adventure->location }}</div>
                        <div class="text-gray-500">Date:</div>
                        <div>{{ $adventure->date }}</div>
                        <div class="text-gray-500">Duration:</div>
                        <div>{{ $adventure->duration }} minutes</div>
                        <div class="text-gray-500">Capacity:</div>
                        <div>{{ $adventure->capacity }}</div>
                        <div class="text-gray-500">Organizer:</div>
                        <div>
                            <a href="/users/{{ $adventure->creator->name }}" class="text-green-700 hover:text-green-900 cursor-pointer">{{ $adventure->creator->name }}</a>
                        </div>
                        <div class="text-gray-500">Participants ({{ $adventure->participants->count() }}/{{ $adventure->capacity }}):</div>
                        <div>
                            <ul>
                                @foreach ($adventure->participants as $participant)
                                    <li>
                                        <a href="/users/{{ $participant->name }}" class="text-green-700 hover:text-green-900 cursor-pointer">{{ $participant->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @auth
                        @if($adventure->creator->id === auth()->id())
                            <form action="{{ route('adventure.delete', ['adventure' => $adventure->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        @else
                            <div class="flex justify-start">
                                <form action="{{ route('adventure.join', ['adventure' => $adventure->id]) }}" method="POST">
                                    @csrf
                                    <button name="join" type="submit" class="bg-green-700 border-2 border-green-700 text-white px-6 py-3 rounded-full hover:text-green-500 hover:bg-white">Join!</button>
                                </form>
                                <form action="{{ route('adventure.interest', ['adventure' => $adventure->id]) }}" method="POST">
                                    @csrf
                                    <button name="interest" type="submit" class="text-green-700 border-2 border-green-700 px-6 py-3 ml-4 rounded-full">I'm interested</button>
                                </form>
                            </div>
                        @endif
                        @else
                            <p class="text-lg text-gray-500">Please <a href="{{ route('login') }}" class="text-lg text-green-700 hover:text-green-900">login</a> to join an adventure!</p>
                    @endauth
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-r-lg">
                <div class="h-full">
                    <img class="w-full h-full object-cover rounded-r-lg" src="{{ $adventure->image_url }}" alt="{{ $adventure->title }}">
                </div>
            </div>
        </div>
    </div>
</x-layout>















