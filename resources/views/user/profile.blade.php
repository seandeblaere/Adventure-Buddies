<x-layout>
    <div class="min-h-screen flex items-center justify-center py-8">
        <div class="container mx-auto">
            <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg flex flex-wrap items-stretch">
                <div class="w-full flex items-stretch rounded-l-lg">
                    <div class="flex-grow p-6">
                        <h1 class="text-3xl font-bold mb-4">{{ $user->name }}</h1>
                        
                        <h2 class="text-2xl font-semibold mt-6 mb-4">Owned Adventures</h2>
                        @if ($user->adventures->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($user->adventures as $adventure)
                                    <x-adventure.mini-card :adventure="$adventure"/>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">This user does not own any adventures.</p>
                        @endif

                        <h2 class="text-2xl font-semibold mt-6 mb-4">Participated Adventures</h2>
                        @if ($user->participatedAdventures->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($user->participatedAdventures as $adventure)
                                    <x-adventure.mini-card :adventure="$adventure"/>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">This user does not participate in any adventures.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


