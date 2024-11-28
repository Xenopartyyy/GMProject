@extends('layout.utama')

@section('konten')
<!-- Section About Us -->
<section id="tentang-kami" class="relative bg-gray-50 py-20 px-4 md:px-10">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0"
        style="background-image: url('{{ asset('assets/semsport.jpg') }}'); background-size: cover; background-position: center;">
    </div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Content with overlay styling -->
    <div class="relative max-w-4xl mx-auto text-center text-white">
        <h2 class="text-6xl font-bold mb-4 animate-rainbow">SEM</h2>
        <p class="text-lg md:text-xl mb-8">Kenyamanan dan performa dalam setiap gerakan.</p>
        <a href="/katalog?search=&kategori=&brand=5"
            class="bg-orange-500 hover:bg-orange-600 text-white py-3 px-6 rounded-full shadow-lg transition duration-300">Jelajahi
            Produk</a>
    </div>
</section>

<!-- Brands Section -->
<section>
    <div class="bg-gradient-to-b from-orange-200 to-white pt-12 px-6 lg:px-20">
        <div class="container mb-10 mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12 bg-white p-10 rounded-lg">
            @foreach ($brand as $index => $item)
            @if (stripos($item->namabrand, 'sem') !== false)
            <div class="flex justify-center mt-8">
                <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}"
                    class="rounded-xl shadow-2xl hover:scale-105 transition-transform duration-500 ease-in-out w-full md:w-4/5 lg:w-3/4 object-cover" />
            </div>

            <div class="text-gray-900 align-top" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl lg:text-5xl font-bold text-orange-600 py-8 text-center">
                    {{ $item->namabrand }}
                </h2>
                <p class="text-lg lg:text-xl text-justify leading-relaxed text-gray-700">
                    {{ $item->deskripsibrand }}
                </p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="kategori" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto text-center overflow-x-hidden">
        <h2 class="text-4xl font-bold text-gray-800 mb-12">Kategori Produk Kami</h2>
        <div id="geseroverflow" class="flex mx-5 space-x-5">
            @for ($i = 0; $i < 10; $i++) <!-- Atur jumlah perulangan sesuai kebutuhan -->
                @foreach ($brand_category as $bc)
                @if (Str::contains($bc->brand->namabrand, 'SEM'))
                <div class="flex flex-shrink-0 relative w-64 h-64 sm:w-80 sm:h-80">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center p-6">
                        <h3 class="text-2xl font-semibold text-white mb-2">{{ $bc->kategori->nmkategori }}</h3>
                        <p class="text-white text-opacity-90">{{ $bc->descatbrands }}</p>
                    </div>
                    <img src="{{ $bc['fotocatbrands'] }}" alt="{{ $bc->kategori->nmkategori }}"
                        class="w-full h-full object-cover" />
                </div>
                @endif
                @endforeach
                @endfor
        </div>
    </div>
</section>

<!-- Product Catalog Section -->
<section id="katalog-produk" class="bg-orange-200 pb-12">
    <div class="text-center bg-orange-400 text-5xl text-white font-bold py-5">
        <h1>Katalog Produk SEM</h1>
    </div>
    <div class="py-15 bg-gradient-to-b from-white to-orange-200 px-10 md:px-20">
        <div class="bg-white container mx-auto y-10 rounded-lg">

            <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 p-20">
                @foreach ($produk->where('brand.namabrand', 'SEM')->take(3) as $p)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform hover:scale-105">
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
                        <p class="text-xl font-bold text-blue-500">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Tombol Lihat Lainnya -->
            <div class="flex justify-center pb-10">
                <a href="/katalog?search=&kategori=&brand=5"
                    class="bg-orange-500 hover:bg-orange-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                    Lihat Lainnya
                </a>
            </div>
        </div>
    </div>
</section>
@endsection