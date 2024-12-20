@extends('layout.utamadashboard')

@section('kontendashboard')
{{-- Dashboard content start --}}
<div class="container mx-auto px-4">
    <h1 class="text-center text-3xl font-bold text-gray-800 my-8">Tambah Perusahaan Baru</h1>

    <form action="{{ url('/dashboard/perusahaan/store')}}" method="POST" enctype="multipart/form-data"
        class="bg-white p-8 rounded-lg shadow-lg space-y-6">
        @csrf

        <div>
            <label for="nmperusahaan" class="block text-lg font-semibold text-gray-700">Nama Perusahaan</label>
            <input type="text" name="nmperusahaan"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('nmperusahaan') @enderror"
                value="{{ old('nmperusahaan') }}" placeholder="Masukkan Nama Perusahaan" />
            @error('nmperusahaan')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="slogan" class="block text-lg font-semibold text-gray-700">Slogan Perusahaan</label>
            <input type="text" name="slogan"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('slogan') @enderror"
                value="{{ old('slogan') }}" placeholder="Masukkan Nama Perusahaan" />
            @error('slogan')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="telp" class="block text-lg font-semibold text-gray-700">Nomor Telpon Perusahaan</label>
            <input type="text" name="telp"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('telp') @enderror"
                value="{{ old('telp') }}" placeholder="Masukkan Nomor Telpon Perusahaan" />
            @error('telp')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="alamat" class="block text-lg font-semibold text-gray-700">Alamat Perusahaan</label>
            <input type="text" name="alamat"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('alamat') @enderror"
                value="{{ old('alamat') }}" placeholder="Masukkan Alamat Perusahaan" />
            @error('alamat')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-lg font-semibold text-gray-700">Email Perusahaan</label>
            <input type="text" name="email"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('email') @enderror"
                value="{{ old('email') }}" placeholder="Masukkan Email Perusahaan" />
            @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="slogan" class="block text-lg font-semibold text-gray-700">Slogan Perusahaan</label>
            <input type="text" name="slogan"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('slogan') @enderror"
                value="{{ old('slogan') }}" placeholder="Masukkan Slogan Perusahaan" />
            @error('slogan')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="descsingkat" class="block text-lg font-semibold text-gray-700">Deskripsi Perusahaan</label>
            <input type="textarea" name="descsingkat"
                class="mt-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200 p-3 @error('descsingkat') @enderror"
                value="{{ old('descsingkat') }}" placeholder="Masukkan Deskripsi Perusahaan" />
            @error('descsingkat')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>



        <!-- Buttons -->
        <div class="flex items-center justify-end space-x-4 pt-4">
            <button type="submit" name="submit" value="save"
                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                Simpan
            </button>
            <a href="{{ url('/dashboard/perusahaan') }}"
                class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
{{-- Dashboard content ends --}}
@endsection