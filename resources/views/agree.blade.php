@extends('layout.utama')

@section('konten')
<section id="tentang-kami" class="relative bg-gray-50 py-20 px-2">
    <!-- Background Animation -->
    <div class="absolute inset-0 z-0 bg-gradient-to-r from-red-500 via-green-500 via-yell to-blue-500 animate-rainbow"></div>

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

    <!-- Content with overlay styling -->
    <div class="relative z-20 max-w-4xl mx-auto text-center text-white">
        <h2 class="text-6xl font-bold mb-8">Agree</h2>
    </div>

    <!-- CSS Animations -->
    <style>
        @keyframes rainbow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-rainbow {
            background-size: 200% 200%;
            animation: rainbow 5s infinite alternate;
        }
    </style>
</section>




<section>
	<div class="bg-gradient-to-b from-emerald-100 to-white py-24 px-6 lg:px-20">
	  <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
		<!-- Iterasi untuk setiap Brand -->
		@foreach ($brand as $index => $item)
		  @if (stripos($item->namabrand, 'agree') !== false || stripos($item->deskripsibrand, 'agree') !== false)
			@if ($index % 2 == 0) <!-- Ganjil (gambar di kiri, deskripsi di kanan) -->
			  <div class="flex justify-center">
				<img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}" class="rounded-lg shadow-lg w-full md:w-4/5 lg:w-3/4 object-cover" />
			  </div>
			  <div class="text-gray-900 align-top">
				<h2 class="text-4xl lg:text-5xl font-bold text-emerald-500 py-8" data-aos="fade-up" data-aos-duration="800">
				  {{ $item->namabrand }}
				</h2>
				<p class="text-lg lg:text-xl text-justify leading-relaxed" data-aos="fade-up" data-aos-duration="1000" style="color: #333;">
				  {{ $item->deskripsibrand }}
				</p>
			  </div>
			@else <!-- Genap (gambar di kanan, deskripsi di kiri) -->
			  <div class="text-gray-900 align-top py-10">
				<h2 class="text-4xl lg:text-5xl font-bold text-blue-400 py-8" data-aos="fade-up" data-aos-duration="800">
				  {{ $item->namabrand }} 
				</h2>
				<p class="text-lg lg:text-xl text-justify leading-relaxed" data-aos="fade-up" data-aos-duration="1000" style="color: #333;">
				  {{ $item->deskripsibrand }}
				</p>
			  </div>
			  <div class="flex justify-center">
				<img src="{{ $item['fotobrand'] }}" alt="Brand {{ $item->namabrand }}" class="rounded-lg shadow-lg w-full md:w-4/5 lg:w-3/4 object-cover" />
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
              <div class="relative w-full sm:w-72 h-80 bg-gray-50 rounded-xl shadow-lg hover:shadow-xl transform transition hover:-translate-y-2" style="background-image: url('{{ $bc['fotocatbrands'] }}'); background-size: cover; background-position: center;">
                  <div class="card absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center p-6 rounded-xl">
                      <h3 class="text-2xl font-semibold text-white mb-2">{{$bc->kategori->nmkategori}}</h3>
                      <p class="text-white text-opacity-90 text-justify">{{$bc->descatbrands}}</p>
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
					<h3 class="text-lg font-semibold text-gray-800">{{ $p->nmbrg }}</h3>
					<p class="text-sm text-gray-500 mb-2">Brand: {{ $p->brand->namabrand }}</p>
					<p class="text-xl font-bold text-blue-500">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
				</div>
			</div>
		@endforeach
	</div>
	
	
	<!-- Tombol Lihat Lainnya -->
	<div class="flex justify-center pb-10 pr-10 md:justify-end">
		<a href="/katalog?search=&kategori=&brand=1" 
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
					<h3 class="text-lg font-semibold text-gray-800">{{ $p->nmbrg }}</h3>
					<p class="text-sm text-gray-500 mb-2">Brand: {{ $p->brand->namabrand }}</p>
					<p class="text-xl font-bold text-blue-500">Rp{{ number_format($p->hrgbrg, 0, ',', '.') }}</p>
				</div>
			</div>
		@endforeach
	</div>
	
	
	<!-- Tombol Lihat Lainnya -->
	<div class="flex justify-center pb-10 pr-10 md:justify-end">
		<a href="/katalog?search=&kategori=&brand=1" 
		class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-full shadow-xl transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
		Lihat Lainnya
	</a>
</div>

</section>
  

<!-- Link to Marketplace -->
<section id="marketplace" class="text-center py-20 bg-green-400">
    <a href="https://marketplace.link.to.agree" target="_blank" class="text-white  bg-slate-600 py-4 px-10 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
        Beli Sekarang di Marketplace
    </a>
</section>
@endsection
