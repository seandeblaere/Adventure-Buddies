<nav class="bg-green-800 p-4 shadow-lg pl-10 pr-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white font-bold text-xl">Adventure Buddies</a>
        <div class="hidden md:flex space-x-4 items-center">
            <a href="/" class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Adventures</a>
            @auth
            <a href="{{ route('adventure.create') }}" class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Create</a>
            <a href="{{ route('chats') }}" class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Chats</a>
            <a href="{{ route('profile.show') }}" class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Profile</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="/login" class="text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Login</a>
            @endauth
        </div>
        <button id="menu-btn" class="block md:hidden text-gray-200 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div id="menu" class="hidden md:hidden">
        <a href="/" class="block text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Adventures</a>
        @auth
        <a href="/adventures/create" class="block text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Create Adventure</a>
        <a href="/profile" class="block text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">My Adventures</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="block text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <a href="/login" class="block text-gray-200 hover:text-white px-3 py-2 transition duration-300 ease-in-out">Login</a>
        @endauth
        <div class="px-3 py-2">
            <input type="text" placeholder="Search..." class="bg-white text-green-800 rounded-full px-4 py-1 focus:outline-none focus:ring-2 focus:ring-green-500 w-full">
        </div>
    </div>
</nav>

<script>
    document.getElementById('menu-btn').addEventListener('click', () => {
        const menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
    });
</script>

