<div class="navbar bg-info text-white" style="font-family: Poppins">
    <div class="navbar-start">
        <div class="dropdown dropdown-hover">
            <button tabindex="0" class="btn btn-ghost lg:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-info text-white rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a href="{{ url('/') }}" class="text-white px-2 py-1">Beranda</a></li>
                <li>
                    <a class="text-white">Brand</a>
                    <ul class="p-2">
                        <li><a>Great Male</a></li>
                        <li><a href="{{ url('/agree') }}">Agree Wear</a></li>
                        <li><a>SEM</a></li>
                        <li><a>KOPRAL</a></li>
                        <li><a>HTE</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/contact') }}" class="text-white px-2 py-1">Hubungi Kami</a></li>
            </ul>
            
        </div>
    
        <div class="text-6xl  text-green-200 pl-6" style="font-family:Archivo Black;">G<span class="text-white">M</span></div>
    </div>

    <div class="navbar-end hidden lg:flex space-x-4 pr-20">
        <!-- Navigasi menggunakan <a> agar href berfungsi -->
        <a href="{{ url('/') }}" class="btn btn-info text-white shadow-none text-sm">Beranda</a>
        
        <div class="dropdown dropdown-hover">
            <button tabindex="0" class="btn btn-info text-white shadow-none text-sm">Brand</button>
            <ul tabindex="0" class="dropdown-content menu bg-info rounded-box w-52 p-5 absolute left-1/2 transform -translate-x-1/2 z-50">
                <li><a>Great Male</a></li>
                <li><a href="{{ url('/agree')}}">Agree Wear</a></li>
                <li><a>SEM</a></li>
                <li><a>KOPRAL</a></li>
                <li><a>HTE</a></li>
            </ul>
        </div>

        <a href="{{ url('/katalog') }}" class="btn btn-info text-white shadow-none text-sm">Katalog Produk</a>

        <a href="{{ url('/contact') }}" class="btn btn-info text-white shadow-none text-sm">Hubungi Kami</a>

    </div>

</div>
