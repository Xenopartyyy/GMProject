@extends('layout.utama')

@section('konten')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="flex justify-center bg-green-400 p-4 border-b">
            <h1 class="text-2xl font-bold text-white ">{{ $produk->nmbrg }}</h1>
        </div>

        <!-- Content Section -->
        <div class="flex flex-col md:flex-row p-6">
            <!-- Image Carousel Section -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-start">
                <div class="relative">
                    <!-- Wrapper untuk tombol agar overflow visible -->
                    <div class="relative w-full h-full overflow-visible">
                        <!-- Slider dengan overflow-hidden -->
                        <div id="carousel"
                            class="relative w-[225px] h-[225px] sm:w-[250px] sm:h-[250px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] xl:h-[450px]  xl:w-[450px]  overflow-hidden">
                            <div id="carousel-track" class="flex transition-transform duration-300 ease-in-out">
                                @php
                                $images = json_decode($produk->fotobrg, true) ?? [];
                                @endphp
                                @foreach ($images as $image)
                                <img src="{{ $image }}" alt="{{ $produk->nmbrg }}"
                                    class="w-[225px] h-[225px] sm:w-[250px] sm:h-[250px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] xl:h-[450px]  xl:w-[450px]  object-cover rounded-md shadow-md cursor-pointer">
                                @endforeach
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <button id="prevBtnModal"
                            class="absolute top-1/2 left-[-50px] transform -translate-y-1/2 flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full shadow-md hover:bg-gray-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button id="nextBtnModal"
                            class="absolute top-1/2 right-[-50px] transform -translate-y-1/2 flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full shadow-md hover:bg-gray-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="w-full md:w-1/2 md:pl-6 mt-6 md:mt-0">
                <p class="text-gray-600 text-sm mb-4">No Artikel: <span class="font-semibold">{{ $produk->noart
                        }}</span></p>
                <p class="text-gray-600 text-sm mb-4">Kategori: <span class="font-semibold">{{
                        $produk->kategori->nmkategori }}</span></p>
                <p class="text-gray-600 text-sm mb-4">Brand: <span class="font-semibold">{{ $produk->brand->namabrand
                        }}</span></p>

                <p class="text-gray-800 text-lg font-bold mb-4">Rp {{ number_format($produk->hrgbrg, 2, ',', '.') }}</p>
                <p class="text-gray-800 text-sm mb-4">
                    <strong>Ukuran:</strong>
                    @foreach (explode(',', $produk->ukbrg) as $ukuran)
                    <span class="inline-block bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded-full mr-2">{{ $ukuran
                        }}</span>
                    @endforeach
                </p>
                <p class="text-gray-800 text-sm mb-4 py-3">
                    <strong>Status Stok:</strong>
                    <span
                        class="text-white p-3 rounded-lg bg-{{ $produk->stokbrg === 'Ready' ? 'green-500' : 'red-500' }}">{{
                        $produk->stokbrg }}</span>
                </p>
                <p class="text-gray-700 text-sm mt-4">
                    <strong>Deskripsi:</strong>
                    <br>
                    {!! nl2br(e($produk->deskbrg)) !!}
                </p>

                <div class="mt-6 flex flex-wrap gap-4">
                    @if ($produk->link_shopee)
                    <a href="{{ $produk->link_shopee }}" target="_blank"
                        class="flex items-center justify-center px-4 py-2 bg-orange-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-orange-700 focus:outline-none w-full sm:w-auto">
                        <i class="fa-brands fa-shopify"></i>
                        <p>&nbsp;Shopee</p>
                    </a>
                    @endif

                    @if ($produk->link_tokped)
                    <a href="{{ $produk->link_tokped }}" target="_blank"
                        class="flex items-center justify-center px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none w-full sm:w-auto">
                        <i class="fa-solid fa-shop"></i>
                        <p>&nbsp;Tokopedia</p>
                    </a>
                    @endif

                    @if ($produk->link_ttshop)
                    <a href="{{ $produk->link_ttshop }}" target="_blank"
                        class="flex items-center justify-center px-4 py-2 bg-black text-white text-sm font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none w-full sm:w-auto">
                        <i class="fa-brands fa-tiktok"></i>
                        <p>&nbsp;Tiktokshop</p>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden flex">
    <div class="relative bg-white rounded-lg shadow-lg">
        <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg" style="max-width: 650px">
    </div>
</div>

@endsection