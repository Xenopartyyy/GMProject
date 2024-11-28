@extends('layout.utama')

@section('konten')

<section id="tentang-kami" class="relative py-40 px-4 md:px-10">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        @php
        // Mengambil sumber data URI
        $media = $brand[0]->media;
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
        <p class="text-white">Media tidak dikenali.</p>
        @endif
    </div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Content with overlay styling -->
    <div class="relative text-center text-white max-w-4xl mx-auto">
        <h2 class="text-5xl sm:text-6xl font-extrabold tracking-tight mb-6 text-shadow-lg"></h2>
        {{-- <p class="text-lg sm:text-xl font-medium">Comfort number one</p> --}}
    </div>
</section>



<section>
    <div class="bg-gradient-to-b from-blue-100 to-white py-24 px-6 lg:px-20">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
            <!-- Iterasi untuk setiap Brand -->
            @foreach ($brand as $index => $item)
            @if (stripos($item->namabrand, 'agree') !== false || stripos($item->deskripsibrand, 'agree') !== false)
            @if ($index % 2 == 0)
            <!-- Ganjil (gambar di kiri, deskripsi di kanan) -->
            <div class="flex justify-center">
                <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}"
                    class="rounded-lg shadow-lg w-full md:w-3/4 md:h-3/4 object-cover" />
            </div>
            <div class="text-gray-900 align-top">
                <h2 class="text-4xl lg:text-5xl text-center font-bold text-blue-500 py-8" data-aos="fade-up"
                    data-aos-duration="800">
                    {{ $item->namabrand }}
                </h2>
                <p class="text-lg lg:text-xl text-justify leading-relaxed" data-aos="fade-up" data-aos-duration="1000"
                    style="color: #333;">
                    {{ $item->deskripsibrand }}
                </p>
            </div>
            @else
            <!-- Genap (gambar di kanan, deskripsi di kiri) -->
            <div class="text-gray-900 align-top py-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-blue-400 py-8" data-aos="fade-up"
                    data-aos-duration="800">
                    {{ $item->namabrand }}
                </h2>
                <p class="text-lg lg:text-xl text-justify leading-relaxed" data-aos="fade-up" data-aos-duration="1000"
                    style="color: #333;">
                    {{ $item->deskripsibrand }}
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}"
                    class="rounded-lg shadow-lg w-full md:w-3/4 md:h-3/4 object-cover" />
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
</section>





<!-- Kategori Section -->
<section id="kategori" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-12">Produk Kami </h2>
        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($brand_category as $bc)
            @if (Str::contains($bc->brand->namabrand, 'Agree'))
            <div class="relative w-full sm:w-72 h-80 bg-gray-50 rounded-xl shadow-lg hover:shadow-xl transform transition hover:-translate-y-2"
                style="background-image: url('{{ $bc['fotocatbrands'] }}'); background-size: cover; background-position: center;">
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




{{-- Agree Section --}}
<section id="katalog-produk" class="py-15 bg-white relative">
    <div class="text-center bg-green-400 text-5xl text-white font-bold py-5">
        <h1>Katalog Produk Agree</h1>
    </div>
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-20 text-white">
        @foreach ($produk->where('brand.namabrand', 'Agree')->take(3) as $p)
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
                <p class="text-lg font-bold text-blue-500 mt-2">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
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
    <div class="flex justify-center pb-10 pr-10 md:justify-end">
        <a href="{{ url('/katalog?search=&kategori=&brand=1') }}"
            class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
            Lihat Lainnya
        </a>
    </div>

</section>

{{-- Agree Kids --}}
<section id="katalog-produk" class="py-15 bg-white relative">
    <div class="text-center bg-blue-400 text-5xl text-white font-bold py-5">
        <h1 class="text-yellow-300">★ <span class="text-white">Katalog Produk Agree Kids</span> ★</h1>
    </div>
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-20 text-white">
        @foreach ($produk->where('brand.namabrand', 'Agree Kids')->take(3) as $p)
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
                <p class="text-lg font-bold text-blue-500 mt-2">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
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
    <div class="flex justify-center pb-10 pr-10 md:justify-end">
        <a href="{{ url('/katalog?search=&kategori=&brand=6') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
            Lihat Lainnya
        </a>
    </div>

</section>


<!-- Link to Marketplace -->
<section id="marketplace" class="text-center py-20 bg-green-400">
    <a href="https://marketplace.link.to.agree" target="_blank"
        class="text-white  bg-slate-600 py-4 px-10 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
        Beli Sekarang di Marketplace
    </a>
</section>
@endsection