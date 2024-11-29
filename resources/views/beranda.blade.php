@extends('layout.utama')

@section('konten')

{{-- CAROSEL START --}}
{{-- <div class="relative w-full mx-auto overflow-hidden">

  <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
    @foreach ($slide as $key => $item)
    <div class="w-full flex-shrink-0">
      <img src="{{ $item['banner'] }}" alt="Banner"
        class="w-full h-[60vh] object-cover md:w-[1366px] md:h-[600px] md:object-fill" />
    </div>
    @endforeach

  </div>


  <button id="prev"
    class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-green-500 text-white text-2xl p-4 rounded-full shadow-lg hover:bg-green-600 hover:scale-110 transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
    &#10094;
  </button>
  <button id="next"
    class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-green-500 text-white text-2xl p-4 rounded-full shadow-lg hover:bg-green-600 hover:scale-110 transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
    &#10095;
  </button>

</div> --}}

<div id="tentang-kami" class="relative py-32 px-4 md:px-10">
  <!-- Background Video -->
  <div class="absolute inset-0 z-0">
    @php
    // Mengambil sumber data URI
    $media = $about[0]->videoawal;
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
    <h2 class="text-5xl sm:text-6xl font-extrabold tracking-tight mb-6 text-shadow-lg">GM</h2>
    <p class="text-lg sm:text-xl font-medium italic">Solusi dalaman pria !</p>
  </div>
</div>


{{-- CAROSEL END --}}

{{-- ABOUT START --}}
<div class="bg-white overflow-x-hidden">
  {{-- <h1 class="text-5xl text-center text-green-400 font-bold pt-10 pb-6" style="font-family: Poppins;"
    data-aos="fade" data-aos-duration="800">Great Male</h1> --}}

  <div class="flex flex-col md:flex-row justify-center py-10 px-4 md:px-10 text-black">
    <div class="flex justify-center md:w-1/2 p-4 md:p-8 items-center 	">
      <img src="{{ $about[0]->fotottg }}" alt="About"
        class="object-cover w-full md:w-10/12 lg:w-8/12 rounded-lg shadow-md " data-aos="fade-left"
        data-aos-duration="800">
    </div>

    <div class="	flex flex-col p-4 md:p-8 md:w-1/2">
      <div class="text-lg md:text-left leading-relaxed 	">
        <p class="text-justify " data-aos="fade-right" data-aos-duration="800">
          {{ $about[0]->ttgkami }}
        </p>
      </div>
    </div>
  </div>
</div>
{{-- ABOUT END --}}

{{-- BRAND START --}}
<div class="bg-gradient-to-b from-white to-neutral-50" style="font-family: Poppins;">
  <div class="text-5xl text-center text-white bg-green-500 font-bold py-10">
    <p data-aos="fade" data-aos-duration="800">Brand Kami</p>
  </div>

  <div class="flex flex-wrap gap-8 px-4 md:px-10 lg:px-20 py-16 justify-center">
    @foreach ($brand as $key => $item)
    <div
      class="bg-white w-full md:w-72 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
      <figure class="overflow-hidden h-48 w-full">
        <img src="{{ $item['fotobrand'] }}" alt="{{ $item['namabrand'] }}" class="object-cover w-full h-full" />
      </figure>
      <div class="p-5">
        <h2 class="text-xl font-semibold text-gray-800">{{ $item['namabrand'] }}</h2>
        <p class="mt-2 text-gray-600">{{ $item['descsingkatbrand'] }}</p>
        <div class="mt-4 flex justify-end">
          <!-- Tautan sebagai tombol -->
          <a href="{{ strtolower(str_replace(' ', '', url('/' . str_ireplace('kids', '', $item['namabrand'])))) }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-600 transition-colors">
            Kunjungi
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>
{{-- BRAND END --}}


{{-- PROS START --}}
<div class="bg-gradient-to-b from-neutral-50 to-emerald-50" style="font-family: Poppins;">
  <div class="text-5xl text-center text-emerald-400 font-bold py-5">
    <p data-aos="fade" data-aos-duration="800">Kelebihan Kami</p>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-5 py-16 justify-items-center">
    <!-- Card 1 -->
    <div class="rounded-lg shadow-lg p-8 max-w-xs bg-white mx-auto">
      <div class="text-center">
        <i class="fa-solid fa-shield text-6xl py-4" style="color: #63E6BE;"></i>
        <h2 class="text-xl font-semibold text-emerald-600 mb-2">Keamanan Barang</h2>
      </div>
      <p class="text-gray-600 text-justify">Produk akan di-packing dengan rapi sampai ke tangan pembeli.</p>
    </div>
    <!-- Card 2 -->
    <div class="rounded-lg shadow-lg p-8 max-w-xs bg-white mx-auto">
      <div class="text-center">
        <i class="fa-solid fa-money-bill text-6xl py-4" style="color: #63E6BE;"></i>
        <h2 class="text-xl font-semibold text-emerald-600 mb-2">Harga Bersaing</h2>
      </div>
      <p class="text-gray-600 text-justify">Produk berkualitas tinggi dengan harga kompetitif, memberikan nilai terbaik
        bagi pelanggan.</p>
    </div>
    <!-- Card 3 -->
    <div class="rounded-lg shadow-lg p-8 max-w-xs bg-white mx-auto">
      <div class="text-center">
        <i class="fa-regular fa-star text-6xl py-4" style="color: #63E6BE;"></i>
        <h2 class="text-xl font-semibold text-emerald-600 mb-2">Kualitas Terjamin</h2>
      </div>
      <p class="text-gray-600 text-justify">Bahan pilihan dan proses ketat memastikan setiap produk awet dan nyaman
        dipakai.</p>
    </div>
  </div>
</div>
{{-- PROS END --}}



{{-- REVIEW START --}}
<section>
  <div class="bg-emerald-50 font-[Poppins]">
    <h1 class="text-5xl text-center text-emerald-400 font-bold py-10">
      Apa Kata Pelanggan Kami?
    </h1>

    <div class="overflow-x-hidden mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:py-12">
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:items-center lg:gap-16">
        <div class="max-w-xl text-center sm:text-left">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            Penilaian Pelanggan
          </h2>

          <p class="mt-4 text-gray-700">
            Berikut ini adalah beberapa penilaian dari pelanggan yang telah menggunakan produk kami
          </p>

          <div class="hidden lg:mt-8 lg:flex lg:gap-4">
            <button aria-label="Previous slide" id="slider-prev-desktop-testi"
              class="rounded-full border border-rose-600 p-3 text-rose-600 transition hover:bg-rose-600 hover:text-white">
              <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button aria-label="Next slide" id="slider-next-desktop-testi"
              class="rounded-full border border-rose-600 p-3 text-rose-600 transition hover:bg-rose-600 hover:text-white">
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>

        <div class="-mx-6 lg:col-span-2 lg:mx-0">
          <div id="slider-testi"
            class="flex overflow-x-auto md:overflow-x-hidden lg:overflow-x-hidden snap-x snap-mandatory scroll-smooth space-x-4 p-4">
            @foreach ($testimoni as $testi)
            <div class="min-w-[90%] sm:min-w-[75%] lg:min-w-[40%] snap-center">
              <blockquote class="flex h-full flex-col justify-between bg-white p-6 shadow-sm sm:p-8 lg:p-12">
                <div>
                  <div class="flex gap-0.5 text-green-500">
                    @for ($i = 0; $i < $testi['bintang']; $i++) <i class="fa-solid fa-star"></i>
                      @endfor
                  </div>
                  <div class="mt-4">
                    <p class="text-2xl font-bold text-rose-600 sm:text-3xl">{{ $testi['namacust'] }}</p>
                    <p class="mt-4 leading-relaxed text-gray-700">
                      {{ $testi['review'] }}
                    </p>
                  </div>
                </div>
              </blockquote>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="mt-8 flex justify-center gap-4 lg:hidden">
        <button aria-label="Previous slide" id="slider-prev-testi"
          class="rounded-full border border-rose-600 p-4 text-rose-600 transition hover:bg-rose-600 hover:text-white">
          <svg class="w-6 h-6 -rotate-180 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
        <button aria-label="Next slide" id="slider-next-testi"
          class="rounded-full border border-rose-600 p-4 text-rose-600 transition hover:bg-rose-600 hover:text-white">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

{{-- REVIEW END --}}


{{-- TIM KAMI START --}}

<div class="timkami bg-gradient-to-b from-emerald-50 to-white py-10" style="font-family: Poppins">
  <h1 class="text-5xl text-center text-emerald-400 font-bold py-10">Tim Kami</h1>
  <div class="grid md:grid-cols-2">
    <div class="cols-span-5 p-10 " data-aos="flip-left" data-aos-duration="800">
      <img src="{{ $about[0]->fototim }}" alt="about" class="w-[547px] h-[377px] object-cover rounded-lg shadow-md">
    </div>
    <div class="cols-span-5 p-10 ">
      <p class="text-justify text-black" style="font-family: Poppins" data-aos="flip-right" data-aos-duration="800">{{
        $about[0]->timkami }}</p>
    </div>
  </div>
</div>

{{-- TIM KAMI END --}}

{{-- DISTRIBUTION START --}}

<div class="bg-white" style="font-family: Poppins;">
  <h1 class="text-5xl text-center text-emerald-400 font-bold py-10 bg-slate-700">Distribusi Produk Kami</h1>

  <div class="flex items-center justify-center w-full h-full py-8 sm:py-16 px-4">
    <div class="w-full relative flex items-center justify-center">

      <div class="w-full max-w-6xl h-full mx-auto overflow-x-hidden overflow-y-hidden">
        <div id="geseroverflow"
          class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
          @for ($i = 0; $i < 10; $i++) <!-- Atur jumlah perulangan sesuai kebutuhan -->
            @foreach ($distribution as $key => $item)
            <div class="flex flex-shrink-0 relative w-64 h-64 sm:w-80 sm:h-80">
              <img src="{{ $item['fototoko'] }}" class="object-cover object-center w-full h-full rounded-lg" />
              <div
                class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6 rounded-lg flex flex-col justify-between">
                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white">{{ $item['namatoko'] }}</h2>
                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white">{{ $item['brand'] }}
                </h3>
              </div>
            </div>
            @endforeach
            @endfor
        </div>
      </div>

    </div>
  </div>
</div>
</div>

{{-- DISTRIBUTION END --}}



@endsection