@extends('layout.utama')

@section('konten')

<section id="tentang-kami"
    class="relative bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 py-32 px-4 md:px-10">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        @php
        // Mengambil sumber data URI
        $media = $brand[2]->media;
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
        @endif
    </div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Content with overlay styling -->
    <div class="relative text-center text-white max-w-4xl mx-auto">
        <h2 class="text-6xl font-extrabold tracking-tight mb-6 text-shadow-lg">Kopral</h2>
    </div>
</section>

<section>
    <div class="bg-gradient-to-b from-gray-200 to-white py-24 px-6 lg:px-20">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
            <!-- Iterasi untuk setiap Brand -->
            @foreach ($brand as $index => $item)
            @if (stripos($item->namabrand, 'kopral') !== false || stripos($item->deskripsibrand, 'kopral') !== false)
            <div class="flex justify-center">
                <img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}"
                    class="rounded-lg shadow-lg w-full md:w-3/4 md:h-3/4 object-cover my-0 items-center" />
            </div>
            <div class="text-gray-900 align-top">
                <p class="text-lg lg:text-xl text-justify leading-relaxed" data-aos="fade-up" data-aos-duration="1000"
                    style="color: #333;">
                    {{ $item->deskripsibrand }}
                </p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<div class="flex flex-wrap md:flex-nowrap">
    <!-- Kategori Section -->
    <section id="kategori" class="w-full md:w-1/5 relative">
        <div class="mx-auto text-center">
            <h1 class="text-center bg-black text-2xl text-white font-bold py-8 px-8">Produk Kami</h1>
            <div id="geseroverflowy" class="mx-5 space-y-5 my-5 overflow-hidden max-h-[calc(100vh-200px)] relative">
                <!-- Loop Kategori -->
                @foreach ($brand_category as $bc)
                @if (Str::contains($bc->brand->namabrand, 'Kopral'))
                <div
                    class="relative w-30 h-30 sm:w-30 sm:h-30 flex flex-col items-center justify-center animate-slide-down">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col">
                        <h3 class="text-2xl font-semibold text-white mb-2 text-center">
                            {{ $bc->kategori->nmkategori }}</h3>
                        <p class="text-white text-opacity-90 text-center">{{ $bc->descatbrands }}</p>
                    </div>
                    <img src="{{ $bc['fotocatbrands'] }}" alt="{{ $bc->kategori->nmkategori }}"
                        class="w-full h-full object-cover" />
                </div>
                @endif
                @endforeach
                <!-- Duplikat kategori untuk loop -->
                @foreach ($brand_category as $bc)
                @if (Str::contains($bc->brand->namabrand, 'Kopral'))
                <div
                    class="relative w-30 h-30 sm:w-30 sm:h-30 flex flex-col items-center justify-center animate-slide-down">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col">
                        <h3 class="text-2xl font-semibold text-white mb-2 text-center">
                            {{ $bc->kategori->nmkategori }}</h3>
                        <p class="text-white text-opacity-90 text-center">{{ $bc->descatbrands }}</p>
                    </div>
                    <img src="{{ $bc['fotocatbrands'] }}" alt="{{ $bc->kategori->nmkategori }}"
                        class="w-full h-full object-cover" />
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Katalog Produk Section -->
    <section id="katalog-produk" class="w-full md:w-4/5 bg-white relative">
        <div class="text-center bg-green-600 text-5xl text-white font-bold py-6">
            <h1>Katalog Produk Kopral</h1>
        </div>
        <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 p-10 text-white">
            @foreach ($produk->where('brand.namabrand', 'Kopral')->take(3) as $p)
            <div
                class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl">
                @php
                $fotoPertama = $p->fotobrg ? json_decode($p->fotobrg, true)[0] ?? null : null;
                @endphp
                @if ($fotoPertama)
                <img src="{{ $fotoPertama }}" alt="{{ $p->nmbrg }}"
                    class="w-full h-56 object-cover transition-all duration-300 ease-in-out transform hover:scale-110">
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
        <div class="flex justify-center pb-10">
            <a href="{{ url('/katalog?search=&kategori=&brand=3') }}"
                class="bg-green-500 hover:bg-green-600 text-white py-3 px-8 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                Lihat Lainnya
            </a>
        </div>
    </section>
</div>

<!-- Script untuk Scroll Otomatis -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.getElementById('geseroverflowy');
            let scrollHeight = scrollContainer.scrollHeight;
            let containerHeight = scrollContainer.clientHeight;
            let scrollPosition = 0;

            // Fungsi untuk scroll otomatis  
            function autoScroll() {
                if (scrollPosition < scrollHeight - containerHeight) {
                    scrollPosition += 0.5; // Setel kecepatan scroll di sini  
                    scrollContainer.scrollTo(0, scrollPosition);
                } else {
                    scrollPosition = 0; // Reset scroll jika sudah sampai bawah  
                    scrollContainer.scrollTo(0, 0);
                }
            }

            // Set interval untuk scroll otomatis  
            setInterval(autoScroll, 30); // 30ms untuk scroll sedikit demi sedikit  
        });
</script>
</div>

@if(!empty($brand[2]->linktree))
<section id="marketplace" class="text-center py-20 bg-green-400">
    <a href="{{ $brand[2]->linktree }}" target="_blank"
        class="text-white bg-slate-600 py-4 px-10 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
        Beli Sekarang di Marketplace
    </a>
</section>
@endif
@endsection