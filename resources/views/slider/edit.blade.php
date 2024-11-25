@extends('layout.utamadashboard')

@section('kontendashboard')
    {{-- dashboard content start --}}
    <div class="container mx-auto px-4">
        <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Edit Slider</h1>

        <form action="/dashboard/slider/{{ $slider->id }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @method('put')
            @csrf

            <!-- Nama Slider -->
            <div>
                <label for="nama" class="block text-lg font-semibold text-gray-700">Nama Slider</label>
                <input type="text" name="nama"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('nama') @enderror"
                    value="{{ old('nama', $slider->nama) }}" placeholder="Masukkan nama slider" />
                @error('nama')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Banner -->
            <div>
                <label for="banner" class="block text-lg font-semibold text-gray-700">Banner</label>
                @if ($slider->banner)
                    <img id="previewBanner" src="{{ $slider->banner }}" alt="Banner" class="mb-2 h-32 w-32 object-cover">
                @else
                    <img id="previewBanner" src="#" alt="Preview Banner" class="hidden mb-2 h-32 w-32 object-cover">
                @endif
                <input type="file" name="banner" id="bannerInput"
                   class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('banner') @enderror"
                   onchange="previewBanner(event)" />
                @error('banner')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            

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
    {{-- dashboard content ends --}}
@endsection
