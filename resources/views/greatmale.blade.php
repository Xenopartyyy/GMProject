@extends('layout.utama')

@section('konten')
<!-- Section About Us -->
<section id="tentang-kami" class="relative bg-gray-50 py-20 px-4 md:px-10">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        @php
        // Mengambil sumber data URI
        $media = $brand[1]->media;
        @endphp

        @if (strpos($media, 'data:video') === 0)
        <!-- Cek jika tipe media adalah video -->
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ $media }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @elseif (strpos($media, 'data:image') === 0)
        <!-- Cek jika tipe media adalah gambar -->
        <img src="{{ $media }}" class="w-full h-full object-cover" alt="Media">
        @else
        <!-- Jika tipe media tidak dikenal -->
        @endif
    </div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Content with overlay styling -->
    <div class="relative max-w-4xl mx-auto text-center text-white">
        <h2 class="text-6xl font-bold mb-4 animate-rainbow">Great Male</h2>
    </div>
</section>

<!-- Brands Section -->
<section>
    <div class="my-10 mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12 bg-white p-10 rounded-lg">
        @foreach ($brand as $index => $item)
        @if (stripos($item->namabrand, 'Great Male') !== false)
        <!-- Container Gambar -->
        <div class="flex items-center justify-center">
            <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}"
                class="rounded-xl shadow-2xl hover:scale-105 transition-transform duration-500 ease-in-out w-full md:w-3/4 md:h-3/4 object-cover" />
        </div>

        <!-- Container Deskripsi -->
        <div class="flex items-center justify-center text-gray-900" data-aos="fade-up" data-aos-duration="1000">
            <p class="text-lg lg:text-xl text-justify leading-relaxed text-gray-700">
                {{ $item->deskripsibrand }}
            </p>
        </div>
        @endif
        @endforeach
    </div>
</section>

<!-- Categories Section -->
<section id="kategori">
    <div class="max-w-6xl mx-auto px-6 text-white text-center my-20">
        <h2 class="text-4xl font-bold mb-12 text-gray-400">Kategori Produk</h2>
        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($brand_category as $bc)
            @if (Str::contains($bc->brand->namabrand, 'Great Male'))
            <div class="relative w-64 h-64 bg-black bg-opacity-30 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ $bc['fotocatbrands'] }}" alt="{{ $bc->kategori->nmkategori }}"
                    class="w-full h-full object-cover">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent p-4 flex flex-col justify-end">
                    <h3 class="text-xl font-bold">{{ $bc->kategori->nmkategori }}</h3>
                    <p class="text-sm">{{ $bc->descatbrands }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Product Catalog Section -->
<section id="katalog-produk" class="bg-gray-200 pb-12">
    <div class="text-center bg-gray-400 text-5xl text-white font-bold py-5">
        <h1>Katalog Produk Great Male</h1>
    </div>
    <div class="py-15 bg-gradient-to-b from-white to-gray-200 px-10 md:px-20">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-20 text-white">
            @foreach ($produk->where('brand.namabrand', 'Great Male')->take(3) as $p)
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
                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $p->nmbrg }}</h3>
                    <p class="text-sm text-gray-500 mb-1">Artikel:
                        <span class="font-medium text-gray-700">{{ $p->noart }}</span>
                    </p>
                    <p class="text-sm text-gray-500 mb-1">Kategori:
                        <span class="font-medium text-gray-700">{{ $p->kategori->nmkategori }}</span>
                    </p>
                    <p class="text-lg font-bold text-blue-500 mt-2">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}
                    </p>
                    <div class="flex items-center justify-between mt-2">
                        <a href="{{ route('detail', ['id' => $p->id]) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                            Detail
                        </a>
                        <p class="text-sm">
                            <span
                                class="inline-block px-2 py-1 rounded-full text-white font-medium {{ $p->stokbrg === 'Ready' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($p->stokbrg) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Tombol Lihat Lainnya -->
        <div class="flex justify-center pb-10">
            <a href="{{ url('/katalog?search=&kategori=&brand=2') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                Lihat Lainnya
            </a>
        </div>
    </div>
</section>

@if(!empty($brand[1]->linktree))
<section id="marketplace" class="text-center py-20 bg-green-400">
    <a href="{{ $brand[1]->linktree }}" target="_blank"
        class="text-white bg-slate-600 py-4 px-10 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
        Beli Sekarang di Marketplace
    </a>
</section>
@endif
@endsection