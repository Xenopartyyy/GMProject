@extends('layout.utama')

@section('konten')
<section class="bg-rgb py-20 md:px-20" style="font-family: 'Poppins', sans-serif; 
           background: linear-gradient(45deg, aqua, #ff8c00, #ff1493, #00bfff); 
           background-size: 400% 400%; 
           animation: gradientAnimation 15s ease infinite;">

    <div class="container mx-auto px-6 lg:px-20 bg-white md:rounded-3xl">
        <h1 class="text-5xl font-bold text-center text-white mb-10">Profil Perusahaan</h1>
        @foreach ($perusahaan as $prsh)
        <h2 class="text-2xl font-semibold text-black mb-4 text-center">{{ $prsh->nmperusahaan }}</h2>
        <p class="text-lg text-black text-justify mb-6">
            {{ $prsh->descsingkat }}
        </p>
        @endforeach

        <h1 class="text-2xl font-bold text-center text-black mb-10">Brand Kami</h1>
        <div class="flex flex-wrap p-2 items-center justify-center">
            @foreach ($brand as $b)
            <div class="mx-3 w-28 h-28 my-auto p-2">
                <img src="{{ $b->fotobrand }}" alt="" class="rounded-xl">
            </div>
            @endforeach
        </div>

        <!-- Informasi Legal -->
        <div class="mt-10 text-center text-black text-sm py-10">
            <p>&copy; 2024 PT Great Male. Seluruh hak cipta dilindungi. Informasi ini disediakan sesuai dengan
                kebijakan dan aturan hukum yang berlaku di Indonesia.</p>
        </div>
    </div>
</section>

<style>
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>
@endsection