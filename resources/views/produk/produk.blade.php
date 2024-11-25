@extends('layout.utamadashboard')

@section('kontendashboard')
<div class="container mx-auto px-4">
  <h1 class="text-center text-2xl font-semibold my-5">Data Produk</h1>
  <div class="flex justify-end mb-4">
    <a href="{{ url('dashboard/produk/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Tambah Produk</a>
  </div>
  <div class="overflow-x-auto mt-6">
    <table id="produkTable" class="min-w-full bg-white border border-gray-300">
      <thead class="border-b border-gray-300">
        <tr>
          <th class="py-2 px-4 border border-gray-300">No.</th>
          <th class="py-2 px-4 border border-gray-300">Aksi</th>
          <th class="py-2 px-4 border border-gray-300">Nomor Artikel</th>
          <th class="py-2 px-4 border border-gray-300">Nama Barang</th>
          <th class="py-2 px-4 border border-gray-300">Kategori</th>
          <th class="py-2 px-4 border border-gray-300">Brand</th>
          <th class="py-2 px-4 border border-gray-300">Ukuran</th>
          <th class="py-2 px-4 border border-gray-300">Deskripsi</th>
          <th class="py-2 px-4 border border-gray-300">Harga</th>
          <th class="py-2 px-4 border border-gray-300">Foto</th>
          <th class="py-2 px-4 border border-gray-300">Stok Barang</th>
          <th class="py-2 px-4 border border-gray-300">Link Shopee</th>
          <th class="py-2 px-4 border border-gray-300">Link Tokopedia</th>
          <th class="py-2 px-4 border border-gray-300">Link Tiktok Shop</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produks as $index => $produk)
        <tr class="text-center hover:bg-gray-100 border-b border-gray-300">
          <td class="py-2 px-4 border border-gray-300">{{ $index + 1 }}</td>
          <td class="py-2 px-4 border border-gray-300">
            <div class="flex justify-center space-x-2">
              <a href="{{ url('dashboard/produk/' . $produk->id . '/edit') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-2 rounded" title="Edit">
                <i class="fa-regular fa-pen-to-square"></i>
              </a>
              <form action="{{ url('dashboard/produk/' . $produk->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Delete">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </form>
            </div>
          </td>
          <td class="py-2 px-4 border border-gray-300">{{ $produk->noart }}</td>
          <td class="py-2 px-4 border border-gray-300">{{ $produk->nmbrg }}</td>
          <td class="py-2 px-4 border border-gray-300">{{ $produk->kategori->nmkategori ?? '-' }}</td>
          <td class="py-2 px-4 border border-gray-300">{{ $produk->brand->namabrand ?? '-' }}</td>
          <td class="py-2 px-4 border border-gray-300">{{ implode(', ', explode(',', $produk->ukbrg)) }}</td>
          <td class="py-2 px-4 border border-gray-300">{{ Str::limit($produk->deskbrg, 50) }}</td>
          <td class="py-2 px-4 border border-gray-300">Rp. {{ number_format($produk->hrgbrg, 2) }}</td>
          <td class="py-2 px-4 border border-gray-300">
            <div class="flex flex-wrap justify-center space-x-2">
              @if (!empty($produk->fotobrg))
                @foreach (json_decode($produk->fotobrg, true) as $foto)
                  <img src="{{ asset('storage/fotobrg/' . $foto) }}" alt="{{ $produk->nmbrg }}" class="w-16 h-16 object-cover rounded">
                @endforeach
              @else
                <p>-</p>
              @endif
            </div>
          </td>
          <td class="py-2 px-4 border border-gray-300">{{ $produk->stokbrg }}</td>
          <td class="py-2 px-4 border border-gray-300"> @if ($produk->link_shopee) ✔️ @else ❌ @endif </td>
          <td class="py-2 px-4 border border-gray-300"> @if ($produk->link_tokped) ✔️ @else ❌ @endif </td>
          <td class="py-2 px-4 border border-gray-300"> @if ($produk->link_ttshop) ✔️ @else ❌ @endif </td>

        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>

<!-- DataTable scripts and styling -->
<link rel="stylesheet" href={{ asset('css/datatables.min.css') }}>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $('#produkTable').DataTable({
      "scrollX": true,
      "autoWidth": false,
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ data per halaman",
        "zeroRecords": "Tidak ada data yang ditemukan",
        "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
        "infoEmpty": "Tidak ada data tersedia",
        "infoFiltered": "(disaring dari _MAX_ total data)"
      },
      "dom": '<"flex justify-between items-center mb-4"lf>t<"flex justify-between items-center mt-4"ip>'
    });
  });
</script>
@endsection
