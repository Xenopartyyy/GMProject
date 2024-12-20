@extends('layout.utamadashboard')

@section('kontendashboard')
{{-- Dashboard content start --}}
<div class="container mx-auto px-4">
    <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Edit About</h1>

    <form action="{{ url('/dashboard/about/'. $about->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-8 rounded-lg shadow-lg space-y-6">
        @method('put')
        @csrf

        <!-- Tentang Kami -->
        <div>
            <label for="ttgkami" class="block text-lg font-semibold text-gray-700">Deskripsi Tentang Kami</label>
            <input type="text" name="ttgkami"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('ttgkami') @enderror"
                value="{{ old('ttgkami', $about->ttgkami) }}" placeholder="Masukkan deskripsi tentang kami" />
            @error('ttgkami')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Tentang -->
        <div>
            <label for="fotottg" class="block text-lg font-semibold text-gray-700">Logo / Foto untuk Halaman
                Depan</label>
            <@if ($about->fotottg)
                <img src="{{ $about->fotottg }}" alt="Foto Toko" class="mb-2 h-32 w-32 object-cover">
                @endif
                <input type="file" name="fotottg"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('fotottg') @enderror"
                    value="{{ old('fotottg') }}" />
                @error('fotottg')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
        </div>

        <!-- Tim Kami -->
        <div>
            <label for="timkami" class="block text-lg font-semibold text-gray-700">Deskripsi Tim Kami</label>
            <input type="text" name="timkami"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('timkami') @enderror"
                value="{{ old('timkami', $about->timkami) }}" placeholder="Masukkan deskripsi tim kami" />
            @error('timkami')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Tim -->
        <div>
            <label for="fototim" class="block text-lg font-semibold text-gray-700">Foto Tim Kami</label>
            @if ($about->fototim)
            <img src="{{ $about->fototim }}" alt="Foto Toko" class="mb-2 h-32 w-32 object-cover">
            @endif
            <input type="file" name="fototim"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('fototim') @enderror"
                value="{{ old('fototim') }}" />
            @error('fototim')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Video Awal -->
        <div>
            <label for="videoawal" class="block text-lg font-semibold text-gray-700">Video Awal</label>
            @if ($about->videoawal)
            <video src="{{ $about->videoawal }}" alt="Foto Toko" class="mb-2 h-32 w-32 object-cover">
                @endif
                <input type="file" name="videoawal"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('videoawal') @enderror"
                    value="{{ old('videoawal') }}" />
                @error('videoawal')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end space-x-4 pt-4">
            <button type="submit" name="submit" value="save"
                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                Simpan
            </button>
            <a href="{{ url('/dashboard/about') }}"
                class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
{{-- Dashboard content ends --}}
@endsection