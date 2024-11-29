<footer class="bg-gray-900 text-gray-200 py-10">
  <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

    <!-- Logo dan Deskripsi -->
    <div class="space-y-4 text-center">
      <div class="flex items-center justify-center space-x-3">
        <span class="text-3xl font-bold text-cyan-500">{{ $perusahaan[0]->nmperusahaan }}</span>
      </div>
      <p class="text-gray-400 italic">{{ $perusahaan[0]->slogan }}</p>
    </div>

    <!-- Informasi Kontak -->
    <div class="space-y-4 text-center">
      <h3 class="text-xl font-semibold text-gray-100">Hubungi Kami</h3>
      <div class="space-y-2 text-gray-400">
        <div class="flex items-center justify-center">
          <i class="fas fa-envelope text-cyan-500 mr-2"></i>
          <span>{{ $perusahaan[0]->email }}</span>
        </div>
        <div class="flex items-center justify-center">
          <i class="fas fa-phone-alt text-cyan-500 mr-2"></i>
          <span>{{ $perusahaan[0]->telp }}</span>
        </div>
        <div class="flex items-center justify-center">
          <i class="fas fa-map-marker-alt text-cyan-500 mr-2"></i>
          <span>{{ $perusahaan[0]->alamat }}</span>
        </div>
      </div>
    </div>

    <!-- Temukan Kami -->
    <div class="space-y-4 text-center">
      <h3 class="text-xl font-semibold text-gray-100">Temukan Kami</h3>
      <div class="space-y-3">
        <div>
          @foreach ($brand as $item)
          @if (!empty($item->linktree))
          <div class="flex justify-center space-x-3">
            <a href="{{ url($item->linktree) }}" target="_blank"
              class="flex items-center text-gray-400 hover:text-cyan-500 transition">
              <i class="fa-solid fa-link"></i> {{ $item->namabrand }}
            </a>
          </div>
          @endif
          @endforeach
        </div>
        <!-- Tambahkan merek lain seperti Agree, Kopral, dsb -->
      </div>
    </div>

    <!-- Navigasi -->
    <div class="space-y-4 text-center">
      <h3 class="text-xl font-semibold text-gray-100">Navigasi</h3>
      <nav class="space-y-2">
        <a href="{{url('/')}}" class="block hover:text-cyan-500 transition">Home</a>
        <a href="{{url('/tentangkami')}}" class="block hover:text-cyan-500 transition">Tentang Kami</a>
        <a href="{{ url('/katalog')}}" class="block hover:text-cyan-500 transition">Katalog</a>
      </nav>
    </div>

  </div>
  <div class="mt-10 border-t border-gray-700 pt-6 text-center">
    <p class="text-gray-400 text-sm">© {{ date('Y') }} {{ $perusahaan[0]->nmperusahaan }}. All rights reserved.</p>
  </div>
</footer>