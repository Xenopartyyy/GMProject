@extends('layout.utamadashboard')

@section('kontendashboard')
{{-- Dashboard content start --}}
<div class="container mx-auto px-4">
    <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Tambah Produk Baru</h1>

    <form action="{{ url('/dashboard/produk/store')}}" method="POST" enctype="multipart/form-data"
        class="bg-white p-8 rounded-lg shadow-lg space-y-6">
        @csrf

        <!-- Artikel Barang -->
        <div>
            <label for="noart" class="block text-lg font-semibold text-gray-700">Nomor Artikel</label>
            <input type="text" name="noart"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('noart') is-invalid @enderror"
                value="{{ old('noart') }}" placeholder="Masukkan Nama Barang" />
            @error('noart')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Nama Barang --}}
        <div>
            <label for="nmbrg" class="block text-lg font-semibold text-gray-700">Nama Barang</label>
            <input type="text" name="nmbrg"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('nmbrg') is-invalid @enderror"
                value="{{ old('nmbrg') }}" placeholder="Masukkan Nama Barang" />
            @error('nmbrg')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label for="kategori_id" class="block text-lg font-semibold text-gray-700">Kategori</label>
            <select name="kategori_id"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3">
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_id')==$kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nmkategori }}
                </option>
                @endforeach
            </select>
            @error('kategori_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Brand -->
        <div>
            <label for="brands_id" class="block text-lg font-semibold text-gray-700">Brand</label>
            <select name="brands_id"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3">
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brands_id')==$brand->id ? 'selected' : '' }}>
                    {{ $brand->namabrand }}
                </option>
                @endforeach
            </select>
            @error('brands_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ukuran Barang (Checkbox) -->
        <div>
            <label class="block text-lg font-semibold text-gray-700">Ukuran Barang</label>
            <div class="mt-2 space-y-2">
                @php
                $availableSizes = ['S', 'M', 'L', 'XL', 'XXL', '3L' ,'4L'];
                $selectedSizes = old('ukbrg', []); // Ambil ukuran yang sebelumnya dipilih jika validasi gagal
                @endphp
                @foreach ($availableSizes as $size)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="ukbrg[]" value="{{ $size }}"
                        class="form-checkbox rounded border-gray-300 focus:ring-2 focus:ring-blue-400" {{
                        in_array($size, $selectedSizes) ? 'checked' : '' }}>
                    <span class="ml-2">{{ $size }}</span>
                </label>
                @endforeach
            </div>
            @error('ukbrg')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Barang -->
        <div>
            <label for="deskbrg" class="block text-lg font-semibold text-gray-700">Deskripsi Barang</label>
            <textarea name="deskbrg"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('deskbrg') is-invalid @enderror"
                placeholder="Masukkan Deskripsi Barang">{{ old('deskbrg') }}</textarea>
            @error('deskbrg')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Harga Barang -->
        <div>
            <label for="hrgbrg" class="block text-lg font-semibold text-gray-700">Harga Barang</label>
            <input type="number" step="0.01" name="hrgbrg"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('hrgbrg') is-invalid @enderror"
                value="{{ old('hrgbrg') }}" placeholder="Masukkan Harga Barang" />
            @error('hrgbrg')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stok Barang -->
        <div>
            <label for="stokbrg" class="block text-lg font-semibold text-gray-700">Status Barang</label>
            <select name="stokbrg"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3">
                <option value="Ready" {{ old('status')=='Ready' ? 'selected' : '' }}>Ready</option>
                <option value="Kosong" {{ old('status')=='Kosong' ? 'selected' : '' }}>Kosong</option>
            </select>
        </div>


        {{-- Link Shopee Barang --}}
        <div>
            <label for="link_shopee" class="block text-lg font-semibold text-gray-700">Link Shopee</label>
            <input type="text" name="link_shopee"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('link_shopee') is-invalid @enderror"
                value="{{ old('link_shopee') }}"
                placeholder="Masukkan Link Barang di Shopee ( kosongkan jika tidak ada )" />
            @error('link_shopee')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Nama Barang --}}
        <div>
            <label for="link_tokped" class="block text-lg font-semibold text-gray-700">Link Tokopedia</label>
            <input type="text" name="link_tokped"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('link_tokped') is-invalid @enderror"
                value="{{ old('link_tokped') }}"
                placeholder="Masukkan Link Barang di Tokopedia ( kosongkan jika tidak ada )" />
            @error('link_tokped')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Nama Barang --}}
        <div>
            <label for="link_ttshop" class="block text-lg font-semibold text-gray-700">Link Tiktok Shop</label>
            <input type="text" name="link_ttshop"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('link_ttshop') is-invalid @enderror"
                value="{{ old('link_ttshop') }}"
                placeholder="Masukkan Link Barang di Tiktok Shop ( kosongkan jika tidak ada )" />
            @error('link_ttshop')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Barang -->
        <div>
            <label for="fotobrg" class="block text-lg font-semibold text-gray-700">Foto Barang</label>
            <div id="image-upload-container">
                <div class="image-upload-item flex items-center space-x-4 mb-4">
                    <input type="file" name="fotobrg[]"
                        class="w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('fotobrg') is-invalid @enderror" />
                    <button type="button"
                        class="remove-image bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-400 transition">
                        Hapus
                    </button>
                </div>
            </div>
            <button type="button" id="add-image"
                class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-400 transition duration-300">
                Tambah Gambar
            </button>
            @error('fotobrg')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end space-x-4 pt-4">
            <button type="submit" name="submit" value="save"
                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                Simpan
            </button>
            <a href="{{ url('/dashboard/produk') }}"
                class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
{{-- Dashboard content ends --}}

{{-- Script to manage dynamic image upload --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const imageContainer = document.getElementById('image-upload-container');
            const addImageButton = document.getElementById('add-image');

            addImageButton.addEventListener('click', () => {
                const newImageField = document.createElement('div');
                newImageField.classList.add('image-upload-item', 'flex', 'items-center', 'space-x-4', 'mb-4');

                newImageField.innerHTML = `
                    <input type="file" name="fotobrg[]" class="w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3" />
                    <button type="button" class="remove-image bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-400 transition">
                        Hapus
                    </button>
                `;

                imageContainer.appendChild(newImageField);

                // Attach remove event
                const removeButton = newImageField.querySelector('.remove-image');
                removeButton.addEventListener('click', () => {
                    imageContainer.removeChild(newImageField);
                });
            });

            // Attach remove event to existing fields
            imageContainer.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-image')) {
                    e.target.closest('.image-upload-item').remove();
                }
            });
        });
</script>
@endsection