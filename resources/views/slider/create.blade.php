@extends('layout.utamadashboard')

@section('kontendashboard')
    {{-- Dashboard content start --}}
    <div class="container mx-auto px-4">
        <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Tambah Slider Baru</h1>

        <form action="/dashboard/slider/store" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @csrf

            <!-- Nama Slider -->
            <div>
                <label for="nama" class="block text-lg font-semibold text-gray-700">Nama Slider</label>
                <input type="text" name="nama"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('nama') @enderror"
                    value="{{ old('nama') }}" placeholder="Masukkan nama slider" />
                @error('nama')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Banner -->
            <div>
                <label for="banner" class="block text-lg font-semibold text-gray-700">Banner</label>
                <input type="file" name="banner"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('banner') @enderror" />
                @error('banner')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->


            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-4">
                <button type="submit" name="submit" value="save" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                    Simpan
                </button>
                <a href="{{ url('/dashboard/slider') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
    {{-- Dashboard content ends --}}
@endsection
