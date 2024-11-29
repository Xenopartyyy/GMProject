<nav class="bg-sky-400 text-white shadow-lg" style="font-family: Poppins">
    <div class="max-w-screen-xl mx-auto px-4 py-2 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <div class="text-6xl text-green-200 font-black">G<span class="text-white">M</span></div>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex space-x-8 items-center relative">
            <a href="{{ url('/') }}"
                class="text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Beranda</a>
            <div class="relative">
                <button id="brand-dropdown-button"
                    class="text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Brand</button>
                <!-- Dropdown Menu -->
                <ul id="brand-dropdown" class="absolute left-0 hidden bg-sky-400 rounded-lg shadow-lg mt-1 w-48 z-10">
                    <li><a href="{{ url('/greatmale') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">Great
                            Male</a></li>
                    <li><a href="{{ url('/agree') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">Agree
                            Wear</a></li>
                    <li><a href="{{ url('/sem') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">SEM</a>
                    </li>
                    <li><a href="{{ url('/kopral') }}"
                            class="block px-4 py-2 text-gray-200 hover:bg-green-500">KOPRAL</a></li>
                    <li><a href="{{ url('/hte') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">HTE</a>
                    </li>
                </ul>
            </div>
            <a href="{{ url('/katalog') }}"
                class="text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Katalog Produk</a>
            <a href="{{ url('/tentangkami') }}"
                class="text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Tentang Kami</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="lg:hidden">
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-8 6h8" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden bg-sky-400">
        <ul class="flex flex-col px-4 py-2 space-y-1">
            <li><a href="{{ url('/') }}"
                    class="block text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Beranda</a>
            </li>
            <li>
                <button
                    class="block w-full text-left text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Brand</button>
                <ul class="bg-sky-400 rounded-lg shadow-lg mt-1">
                    <li><a href="{{ url('/greatmale') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">Great
                            Male</a></li>
                    <li><a href="{{ url('/agree') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">Agree
                            Wear</a></li>
                    <li><a href="{{ url('/sem') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">SEM</a>
                    </li>
                    <li><a href="{{ url('/kopral') }}"
                            class="block px-4 py-2 text-gray-200 hover:bg-green-500">KOPRAL</a></li>
                    <li><a href="{{ url('/hte') }}" class="block px-4 py-2 text-gray-200 hover:bg-green-500">HTE</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('/katalog') }}"
                    class="block text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Katalog
                    Produk</a></li>
            <li><a href="{{ url('/contact') }}"
                    class="block text-white hover:bg-green-500 rounded-lg px-3 py-2 transition duration-300">Hubungi
                    Kami</a></li>
        </ul>
    </div>
</nav>

<script>
    // Toggle mobile menu  
    const mobileMenuButton = document.getElementById('mobile-menu-button');  
    const mobileMenu = document.getElementById('mobile-menu');  

    mobileMenuButton.addEventListener('click', () => {  
        mobileMenu.classList.toggle('hidden');  
    });  

    // Dropdown functionality for Brand  
    const brandDropdownButton = document.getElementById('brand-dropdown-button');  
    const brandDropdown = document.getElementById('brand-dropdown');  

    brandDropdownButton.addEventListener('click', (event) => {  
        event.stopPropagation(); // Prevent click event from bubbling up  
        brandDropdown.classList.toggle('hidden');  
    });  

    // Close dropdown if clicked outside  
    document.addEventListener('click', (event) => {  
        if (!brandDropdownButton.contains(event.target) && !brandDropdown.contains(event.target)) {  
            brandDropdown.classList.add('hidden');  
        }  
    });  
</script>