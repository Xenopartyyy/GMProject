@extends('layout.utamadashboard')

@section('kontendashboard')
    {{-- dashboard content start --}}
    <div class="container mx-auto px-4">
        <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Edit testimoni</h1>

        <form action="/dashboard/testimoni/{{ $testimoni->id }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @method('put')
            @csrf

            <!-- Nama testimoni -->
            <div>
                <label for="namacust" class="block text-lg font-semibold text-gray-700">Nama Customer</label>
                <input type="text" name="namacust"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('namacust') @enderror"
                    value="{{ old('namacust', $testimoni->namacust) }}" placeholder="Masukkan Nama Customer" />
                @error('namacust')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bintang -->
            <div>
                <label for="bintang" class="block text-lg font-semibold text-gray-700">Bintang Customer</label>
                <input type="number" name="bintang"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('bintang') @enderror" 
                    value="{{ old('bintang', $testimoni->bintang) }}" placeholder="Masukkan Bintang Customer" />
                @error('bintang')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- review -->
            <div>
                <label for="review" class="block text-lg font-semibold text-gray-700">Review</label>
                <input type="text" name="review"
                    class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('review') @enderror" 
                    value="{{ old('review', $testimoni->review) }}" placeholder="Masukkan Review Customer" />
                @error('review')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-4">
                <button type="submit" name="submit" value="save" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                    Simpan
                </button>
                <a href="{{ url('/dashboard/testimoni') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
    {{-- dashboard content ends --}}
@endsection
