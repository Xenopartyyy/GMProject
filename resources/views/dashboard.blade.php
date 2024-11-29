@extends('layout.utamadashboard')

@section('kontendashboard')

<div class="container mx-auto px-6 py-8 text-center">
  <!-- Header -->
  <div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-gray-800">Dashboard Web Katalog GM</h1>
    <p class="text-gray-500 mt-2">Pantau statistik dan data katalog Anda di sini!</p>
  </div>

  <!-- Statistik Utama -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Barang yang Terunggah -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h3 class="text-lg font-semibold text-gray-700">Barang yang Terunggah</h3>
      <p class="text-4xl font-bold text-indigo-600 mt-4">{{ $produk ? count($produk) : 0 }}</p>
    </div>

    <!-- Banyaknya Brand -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h3 class="text-lg font-semibold text-gray-700">Banyaknya Brand</h3>
      <p class="text-4xl font-bold text-green-600 mt-4">{{ $brand ? count($brand) : 0 }}</p>
    </div>

    <!-- Banyaknya Kategori -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h3 class="text-lg font-semibold text-gray-700">Banyaknya Kategori Barang</h3>
      <p class="text-4xl font-bold text-green-600 mt-4">{{ $kategori ? count($kategori) : 0 }}</p>
    </div>
  </div>

  <div class="flex flex-wrap gap-6 px-6">
    <!-- Jumlah Barang Tiap Brand -->
    <div class="bg-gray-50 shadow-md rounded-lg p-6 flex-1 min-w-[300px]">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Jumlah Barang Tiap Brand</h3>
      @foreach ($brand as $br)
      <div class="flex justify-between items-center bg-white shadow-sm rounded p-4 mb-2">
        <p class="text-gray-700 font-medium">{{ $br->namabrand }}</p>
        <p class="text-blue-600 font-bold">
          {{ $brandcategory->where('brands_id', $br->id)->count() }}
        </p>
      </div>
      @endforeach
    </div>

    <!-- Jumlah Produk Tiap Kategori -->
    <div class="bg-gray-50 shadow-md rounded-lg p-6 flex-1 min-w-[300px]">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Jumlah Produk Tiap Kategori</h3>
      @foreach ($kategori as $kat)
      <div class="flex justify-between items-center bg-white shadow-sm rounded p-4 mb-2">
        <p class="text-gray-700 font-medium">{{ $kat->nmkategori }}</p>
        <p class="text-blue-600 font-bold">
          {{ $produk->where('kategori_id', $kat->id)->count() }}
        </p>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection