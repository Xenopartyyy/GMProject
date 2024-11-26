@extends('layout.utama')

@section('konten')
<!-- Section About Us -->
<section id="tentang-kami" class="relative bg-gray-50 py-20 px-4 md:px-10">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('assets/semsport.jpg') }}'); background-size: cover; background-position: center;"></div>
    
    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50 "></div>
    
    <!-- Content with overlay styling -->
    <div class="relative max-w-4xl mx-auto text-center text-white">
        <h2 class="text-5xl md:text-6xl font-bold mb-8 animate-rainbow">SEM</h2>
    </div>
  
</section>

<!-- Brands Section -->
<section class="bg-gradient-to-b from-green-100 to-white py-24 px-6 lg:px-20">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
        <!-- Iterasi untuk setiap Brand -->
        @foreach ($brand as $item)
            @if (preg_match('/\bsem\b/i', $item->namabrand) || preg_match('/\bsem\b/i', $item->deskripsibrand))
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <!-- Brand Image -->
                    <div class="w-full md:w-1/2">
                        <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}" class="rounded-lg shadow-lg w-full object-cover" />
                    </div>
                    <!-- Brand Text -->
                    <div class="w-full md:w-1/2 text-gray-900">
                        <h2 class="text-3xl lg:text-4xl font-bold text-emerald-500 py-4">{{ $item->namabrand }}</h2>
                        <p class="text-lg lg:text-xl text-justify leading-relaxed" style="color: #333;">
                            {{ $item->deskripsibrand }}
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>

<!-- Categories Section -->
<section id="kategori" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-12">Produk Kami</h2>
        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($brand_category as $bc)
                @if (Str::contains($bc->brand->namabrand, 'Sem'))
                    <div class="relative w-full sm:w-72 h-80 bg-gray-50 rounded-xl shadow-lg hover:shadow-xl transform transition hover:-translate-y-2" style="background-image: url('{{ $bc['fotocatbrands'] }}'); background-size: cover; background-position: center;">
                        <div class="card absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center p-6 rounded-xl">
                            <h3 class="text-2xl font-semibold text-white mb-2">{{ $bc->kategori->nmkategori }}</h3>
                            <p class="text-white text-opacity-90 text-justify">{{ $bc->descatbrands }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Product Catalog Section -->
<section id="katalog-produk" class="py-15 bg-white relative">
    <div class="text-center bg-green-400 text-5xl text-white font-bold py-5">
        <h1>Katalog Produk Sem</h1>
    </div>
    
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-20">
        @foreach ($produk->where('brand.namabrand', 'Sem')->take(3) as $p)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                @php
                    $fotoPertama = $p->fotobrg ? json_decode($p->fotobrg, true)[0] ?? null : null;
                @endphp
                @if ($fotoPertama)
                    <img src="{{ $fotoPertama }}" alt="{{ $p->nmbrg }}" class="w-full h-56 object-cover">
                @else
                    <img src="{{ asset('default-image.png') }}" alt="Default Image" class="w-full h-56 object-cover">
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $p->nmbrg }}</h3>
                    <p class="text-sm text-gray-500 mb-2">Brand: {{ $p->brand->namabrand }}</p>
                    <p class="text-xl font-bold text-blue-500">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol Lihat Lainnya -->
    <div class="flex justify-center pb-10 pr-10 md:justify-end">
        <a href="/katalog?search=&kategori=&brand=5" 
            class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
            Lihat Lainnya
        </a>
    </div>
</section>

@endsection
