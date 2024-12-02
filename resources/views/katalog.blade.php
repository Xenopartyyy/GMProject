@extends('layout.utama')

@section('konten')
<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8" style="font-family: Poppins;">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">Katalog Produk</h1>

    <!-- Filter Section -->
    <div class="mb-12">
        <form method="GET" action="{{ route('katalog.index') }}"
            class="bg-gradient-to-r from-emerald-400 to-green-500 p-8 rounded-lg grid gap-6 lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 items-center text-white shadow-xl">

            <!-- Search Filter -->
            <div>
                <label for="noart" class="block text-lg font-medium text-white mb-2">Cari Artikel:</label>
                <input id="noart" name="noart" type="number" placeholder="Cari nomor artikel produk"
                    value="{{ request('noart') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
            </div>

            <div>
                <label for="search" class="block text-lg font-medium text-white mb-2">Cari Produk:</label>
                <input id="search" name="search" type="text" placeholder="Cari nama produk"
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
            </div>

            <!-- Kategori Filter -->
            <div>
                <label class="block text-lg font-medium text-white mb-2">Kategori</label>
                <select name="kategori"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori')==$k->id ? 'selected' : '' }}>
                        {{ $k->nmkategori }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Brand Filter -->
            <div>
                <label class="block text-lg font-medium text-white mb-2">Brand</label>
                <select name="brand"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
                    <option value="">Semua Brand</option>
                    @foreach($brand as $b)
                    <option value="{{ $b->id }}" {{ request('brand')==$b->id ? 'selected' : '' }}>
                        {{ $b->namabrand }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Harga Filter -->
            <div>
                <label class="block text-lg font-medium text-white mb-2">Harga</label>
                <div class="flex gap-4">
                    <input type="number" name="harga_min" placeholder="Min" value="{{ request('harga_min') }}"
                        class="w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
                    <input type="number" name="harga_max" placeholder="Max" value="{{ request('harga_max') }}"
                        class="w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
                </div>
            </div>

            {{-- Stok Filter --}}
            <div>
                <label class="block text-lg font-medium text-white mb-2">Status Stok</label>
                <select name="stokbrg"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-800">
                    <option value="">Semua Barang</option>
                    <option value="Ready" {{ request('stokbrg')=='Ready' ? 'selected' : '' }}>Ready</option>
                    <option value="Kosong" {{ request('stokbrg')=='Kosong' ? 'selected' : '' }}>Kosong</option>
                </select>
            </div>



            <!-- Reset and Apply Button -->
            <div class="lg:col-span-4 flex justify-end gap-4">
                <button type="submit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-center px-6 py-2 rounded-lg shadow-lg transition-transform transform hover:scale-105">Terapkan
                    Filter</button>
                <a href="{{ route('katalog.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white text-center px-6 py-2 rounded-lg shadow-lg transition-transform transform hover:scale-105">Reset
                    Filter</a>
            </div>
        </form>
    </div>

    <!-- Product Grid -->
    <div class="my-10">
        {{ $produk->links() }}
    </div>

    <!-- Updated Grid for Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($produk as $p)
        <div
            class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform hover:scale-105 text-sm sm:text-base">
            @php
            $fotoPertama = $p->fotobrg ? json_decode($p->fotobrg, true)[0] ?? null : null;
            @endphp
            @if ($fotoPertama)
            <img src="{{ $fotoPertama }}" alt="{{ $p->nmbrg }}" class="w-full h-40 sm:h-56 object-cover">
            @else
            <img src="{{ asset('default-image.png') }}" alt="Default Image" class="w-full h-40 sm:h-56 object-cover">
            @endif
            <div class="p-3 sm:p-4">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 truncate">{{ $p->nmbrg }}</h3>
                <p class="text-xs sm:text-sm text-gray-500 mb-1">Artikel:
                    <span class="font-medium text-gray-700">{{ $p->noart }}</span>
                </p>
                <p class="text-xs sm:text-sm text-gray-500 mb-1">Kategori:
                    <span class="font-medium text-gray-700">{{ $p->kategori->nmkategori }}</span>
                </p>
                <p class="text-sm sm:text-lg font-bold text-blue-500 mt-2">Rp{{ number_format($p->hrgbrg, 0, ',', '.')
                    }}
                </p>
                <div class="flex items-center justify-between mt-2">
                    <a href="{{ route('detail', ['id' => $p->id]) }}"
                        class="bg-blue-500 text-white px-3 sm:px-4 py-1 sm:py-2 rounded-lg text-xs sm:text-sm font-medium hover:bg-blue-600 transition-colors">
                        Detail
                    </a>
                    <p class="text-xs sm:text-sm">
                        <span
                            class="inline-block px-2 sm:px-2 py-1 rounded-full text-white font-medium {{ $p->stokbrg === 'Ready' ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ ucfirst($p->stokbrg) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>



    <div class="mt-10">
        {{ $produk->links() }}
    </div>
</div>
@endsection