@extends('layout.utama')

@section('konten')
    <section class="bg-rgb py-20 px-20"
        style="font-family: 'Poppins', sans-serif; background-image: url('{{ asset('assets/gmsms.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-6 lg:px-20 bg-white rounded-3xl">
            <h1 class="text-5xl font-bold text-center text-white mb-10">Profil Perusahaan</h1>
            @foreach ($perusahaan as $prsh)
                <h2 class="text-2xl font-semibold text-black mb-4 text-center">{{ $prsh->nmperusahaan }}</h2>
                <p class="text-lg text-black text-justify mb-6">
                    {{ $prsh->descsingkat }}
                </p>
                {{-- <h3 class="text-2xl font-semibold text-black mb-4">Kontak Kami</h3>
                <div class="space-y-4">
                    <div class=" items-center text-black">
                        <i class="fas fa-envelope h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>{{ $prsh->email }}</span>
                    </div>

                    <div class=" items-center text-black">
                        <i class="fas fa-phone-alt h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>{{ $prsh->telp }}</span>
                    </div>

                    <div class=" items-center text-black">
                        <i class="fas fa-map-marker-alt h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>{{ $prsh->alamat }}</span>
                    </div>
                </div> --}}
            @endforeach

            <h1 class="text-2xl font-bold text-center text-black mb-10">Brand Kami</h1>
            <div class="flex flex-wrap px-2 items-center justify-center">
                @foreach ($brand as $b)
                    <div class="mx-3 w-28 h-28 my-auto">
                        <img src="{{ $b->fotobrand }}" alt="" srcset="" class=" rounded-xl">
                    </div>
                @endforeach
            </div>


            <!-- Informasi Legal -->
            <div class="mt-10 text-center text-black text-sm py-10">
                <p>&copy; 2024 PT Great Male. Seluruh hak cipta dilindungi. Informasi ini disediakan sesuai dengan
                    kebijakan
                    dan aturan hukum yang berlaku di Indonesia.</p>
            </div>
        </div>
    </section>
@endsection
