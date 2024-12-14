<!-- Sidebar Layout Partial -->
<div id="app" class="flex min-h-screen bg-gray-100">

  <!-- Sidebar -->
  <div id="sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300 ease-in-out z-30 shadow-lg z-50">
    <div class="p-4 text-2xl font-bold text-center border-b border-gray-700">MyGMCommerce Dashboard</div>
    <nav class="mt-4 flex-grow space-y-1">

      <div class="relative">
        <a href="{{ url('/') }}" target="_blank"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-earth-americas"></i>
          <p class="ml-2">Halaman Web GM</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/web/greatmale') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-regular fa-keyboard"></i>
          <p class="ml-2">Halaman Dashboard</p>
        </a>
      </div>

      <div class="relative">
        <button onclick="toggleSubMenu('menu1')"
          class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-house"></i>
          <p class="ml-2">Halaman Utama</p>
          <svg id="menu1-icon" class="w-4 h-4 ml-auto transition-transform transform duration-200"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Sub-menu -->
        <div id="menu1" class="ml-8 mt-1 space-y-2 transition-opacity duration-200 hidden">
          <a href="{{ url('/dashboard/about') }}"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i
              class="fa-solid fa-people-group"></i> Tentang Kami</a>
          <a href="{{ url('/dashboard/testimoni') }}"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i
              class="fa-regular fa-thumbs-up"></i> Testimoni</a>
          <a href="{{ url('/dashboard/distribution') }}"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition"><i
              class="fa-solid fa-network-wired"></i> Distribusi Produk</a>
        </div>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/perusahaan') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-regular fa-building"></i>
          <p class="ml-2">Profil Perusahaan</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/brand') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-regular fa-copyright"></i>
          <p class="ml-2">Brand</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/kategori') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-list"></i>
          <p class="ml-2">Kategori</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/brandcategory') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-table"></i>
          <p class="ml-2">Kategori Tiap Brand</p>
        </a>
      </div>

      <div class="relative">
        <a href="{{ url('/dashboard/produk') }}"
          class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
          <i class="fa-solid fa-box"></i>
          <p class="ml-2">Produk</p>
        </a>
      </div>


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
  <div class="fixed top-4 left-4 z-40">
    <button onclick="toggleSidebar()"
      class="text-gray-800 bg-gray-200 hover:bg-gray-300 p-3 rounded-full shadow-md focus:outline-none">
      <i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #000000;"></i>
    </button>
  </div>

  <!-- Overlay -->
  <div id="overlaysidebar" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-60 z-20 hidden"></div>

</div>