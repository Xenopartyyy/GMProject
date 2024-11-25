<!-- Sidebar Layout Partial -->
<div id="app" class="flex min-h-screen bg-gray-100">

  <!-- Sidebar -->
  <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300 ease-in-out z-30 shadow-lg">
    <div class="p-4 text-2xl font-bold text-center border-b border-gray-700">My App</div>
    <nav class="mt-4 flex-grow space-y-1">

      <div class="relative">
        <a href="{{ url('/dashboard/web/greatmale') }}" class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-regular fa-keyboard"></i>          
          <p class="ml-2">Halaman Dashboard</p>
        </a>
      </div>

      <div class="relative">
        <button onclick="toggleSubMenu('menu1')" class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-house"></i>
          <p class="ml-2">Halaman Utama</p>
          <svg id="menu1-icon" class="w-4 h-4 ml-auto transition-transform transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Sub-menu for Products -->
        <div id="menu1" class="ml-8 mt-1 space-y-2 transition-opacity duration-200 hidden">
          <a href="{{ url('/dashboard/slider') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i class="fa-regular fa-rectangle-xmark"></i> Slider</a>
          <a href="{{ url('/dashboard/about') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i class="fa-solid fa-people-group"></i> Tentang Kami</a>
          <a href="{{ url('/dashboard/testimoni') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i class="fa-regular fa-thumbs-up"></i> Testimoni</a>
          <a href="{{ url('/dashboard/distribution') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i class="fa-solid fa-network-wired"></i> Distribusi Produk</a>
        </div>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/brand') }}" class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-regular fa-copyright"></i>
          <p class="ml-2">Brand</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/kategori') }}" class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-list"></i>
          <p class="ml-2">Kategori</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/brandcategory') }}" class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-table"></i>
          <p class="ml-2">Kategori Tiap Brand</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/produk') }}" class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-box"></i>
          <p class="ml-2">Produk</p>
        </a>
      </div>

      <!-- Products with Sub-Menu -->
      <div class="relative">
        <button onclick="toggleSubMenu('menu2')" class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-display"></i>
          <p class="ml-2">Halaman Brand</p>
          <svg id="menu2-icon" class="w-4 h-4 ml-auto transition-transform transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Sub-menu for Products -->
        <div id="menu2" class="ml-8 mt-1 space-y-2 transition-opacity duration-200 hidden">
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">Produk GM</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">Produk Agree</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">Produk Kopral</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">Produk HTE</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">Produk SEM</a>
        </div>
      </div>

      <a href="/" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
        <i class="fa-solid fa-earth-americas"></i>        
        <p class="ml-2">Web Utama</p>
      </a>
    </nav>
    <div class="p-4">
      <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 rounded transition">
              Logout
          </button>
      </form>
  </div>
  
  </div>

  <!-- Hamburger Button -->
  <div class="absolute top-4 left-4 z-40">
    <button onclick="toggleSidebar()" class="text-gray-800 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>

  <!-- Overlay -->
  <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-60 z-20 hidden"></div>

</div>

<script>
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  function toggleSidebar() {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
  }

  function toggleSubMenu(menuId) {
    const menu = document.getElementById(menuId);
    const icon = document.getElementById(`${menuId}-icon`);
    menu.classList.toggle('hidden');
    icon.classList.toggle('rotate-90');
  }
</script>
