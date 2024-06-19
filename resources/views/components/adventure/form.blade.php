<div class="bg-cover bg-center flex flex-col justify-between" style="background-image: url('https://images.unsplash.com/photo-1618083707368-b3823daa2726?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="container mx-auto py-8 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl bg-white bg-opacity-60 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-semibold mb-4">Create Adventure</h1>
            <form action="{{ route('adventure.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" style="caret-color: white;">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" style="caret-color: white;"></textarea>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-900">Location</label>
                    <input type="text" name="location" id="location" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" style="caret-color: white;">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-900">Date</label>
                    <input type="date" name="date" id="date" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" style="caret-color: white;">
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-sm font-medium text-gray-900">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" min="30" max="240" style="caret-color: white;">
                </div>
                <div class="mb-4">
                    <label for="capacity" class="block text-sm font-medium text-gray-900">Capacity</label>
                    <input type="number" name="capacity" id="capacity" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" min="5" max="20" style="caret-color: white;">
                </div>
                <div class="mb-4">
                    <label for="image_url" class="block text-sm font-medium text-gray-900">Image URL</label>
                    <input type="text" name="image_url" id="image_url" class="mt-1 h-10 bg-gray-800 bg-opacity-60 text-white px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" style="caret-color: white;">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="flex justify-center">
                    <button type="submit" class="inline-flex justify-center py-3 px-10 border border-transparent shadow-sm text-m font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>







