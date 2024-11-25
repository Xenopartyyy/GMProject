@extends('layout.utamadashboard')

@section('kontendashboard')
    {{-- Dashboard content start --}}
    <div class="container mx-auto px-4">
        <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Edit Distribution</h1>

        <form action="/dashboard/distribution/{{ $distribution->id }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @method('put')
            @csrf

            <div>
                <label for="namatoko" class="block text-lg font-semibold text-gray-700">Nama Toko</label>
                <input type="text" name="namatoko"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('namatoko') @enderror"
                    value="{{ old('namatoko', $distribution->namatoko) }}" placeholder="Masukkan Nama Toko" />
                @error('namatoko')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="fototoko" class="block text-lg font-semibold text-gray-700">Foto Toko</label>
                @if ($distribution->fototoko)
                    <img src="{{ asset('storage/fototoko/' . $distribution->fototoko) }}" alt="Foto Toko" class="mb-2 h-32 w-32 object-cover">
                @endif
                <input type="file" name="fototoko"
                       class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('fototoko') @enderror"
                       value="{{ old('fototoko') }}" />
                @error('fototoko')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            

            <div>
                <label for="brand" class="block text-lg font-semibold text-gray-700">Brand Kami</label>
                <input type="text" name="brand"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('brand') @enderror"
                    value="{{ old('brand', $distribution->brand) }}" placeholder="Masukkan Brand kami" />
                @error('brand')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-4">
                <button type="submit" name="submit" value="save" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                    Simpan
                </button>
                <a href="{{ url('/dashboard/distribution') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
    {{-- Dashboard content ends --}}
@endsection
