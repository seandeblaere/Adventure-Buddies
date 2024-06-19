<x-layout>
    <x-layout.search/>
    <div class="min-h-screen container mx-auto py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pl-20 pr-20">
            @foreach ($adventures as $adventure)
                <x-adventure.card :adventure="$adventure"/>
            @endforeach
        </div>
    </div>
    <div class="mt-4 mb-8 flex justify-center">
        {{ $adventures->links() }}
    </div>
</x-layout>



