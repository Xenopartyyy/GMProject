@extends('layout.utama')

@section('konten')
<section id="tentang-kami" class="relative bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 py-32 px-4 md:px-10">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('assets/tentara.jpg') }}'); background-size: cover; background-position: center;"></div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Content with overlay styling -->
    <div class="relative text-center text-white max-w-4xl mx-auto">
        <h2 class="text-5xl sm:text-6xl font-extrabold tracking-tight mb-6 text-shadow-lg">Kopral</h2>
        <p class="text-lg sm:text-xl font-medium">Pioneering a new era of innovation with military precision and strategic design.</p>
    </div>
</section>

<section>
    <div class="bg-gradient-to-b from-green-200 to-white py-24 px-6 lg:px-20">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
            <!-- Iterasi untuk setiap Brand -->
            @foreach ($brand as $index => $item)
                @if (stripos($item->namabrand, 'kopral') !== false || stripos($item->deskripsibrand, 'kopral') !== false)
                    <div class="text-gray-900 align-top" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="text-4xl lg:text-5xl font-bold text-emerald-600 py-8">
                            {{ $item->namabrand }}
                        </h2>
                        <p class="text-lg lg:text-xl text-justify leading-relaxed text-gray-700">
                            {{ $item->deskripsibrand }}
                        </p>
                    </div>

                    <div class="flex justify-center mt-8">
                        <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}" class="rounded-xl shadow-2xl hover:scale-105 transition-transform duration-500 ease-in-out w-full md:w-4/5 lg:w-3/4 object-cover" />
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Kategori Section -->
<section id="kategori" class="py-24 bg-gradient-to-b from-white to-teal-100">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl text-gray-800 mb-12 font-bold">Produk Kami</h2>
        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($brand_category as $bc)
                @if (Str::contains($bc->brand->namabrand, 'Kopral'))
                    <div class="relative w-full sm:w-72 h-80 bg-gray-100 rounded-2xl shadow-xl hover:shadow-2xl transform transition duration-300 hover:scale-105" style="background-image: url('{{ $bc['fotocatbrands'] }}'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center p-6 rounded-2xl">
                            <h3 class="text-2xl font-semibold text-white mb-2">{{ $bc->kategori->nmkategori }}</h3>
                            <p class="text-white text-opacity-90 text-sm">{{ $bc->descatbrands }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- Kopral Section --}}
<section id="katalog-produk" class=" bg-white relative">
    <div class="text-center bg-green-600 text-5xl text-white font-bold py-6">
        <h1>Katalog Produk Kopral</h1>
    </div>
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-12 text-white">
        @foreach ($produk->where('brand.namabrand', 'Kopral')->take(3) as $p)
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl">
                @php
                    $fotoPertama = $p->fotobrg ? json_decode($p->fotobrg, true)[0] ?? null : null;
                @endphp
                @if ($fotoPertama)
                    <img src="{{ $fotoPertama }}" alt="{{ $p->nmbrg }}" class="w-full h-56 object-cover transition-all duration-300 ease-in-out transform hover:scale-110">
                @else
                    <img src="{{ asset('default-image.png') }}" alt="Default Image" class="w-full h-56 object-cover">
                @endif
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $p->nmbrg }}</h3>
                    <p class="text-sm text-gray-500 mb-2">Brand: {{ $p->brand->namabrand }}</p>
                    <p class="text-xl font-bold text-green-500">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol Lihat Lainnya -->
    <div class="flex justify-center pb-10 md:justify-end">
        <a href="/katalog?search=&kategori=&brand=3" class="bg-green-500 hover:bg-green-600 text-white py-3 px-8 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
            Lihat Lainnya
        </a>
    </div>
</section>

@endsection
