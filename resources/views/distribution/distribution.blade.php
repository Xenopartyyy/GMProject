
@extends('layout.utamadashboard')

@section('kontendashboard')
<div class="container mx-auto px-4">
  <h1 class="text-center text-2xl font-semibold my-5">Data Distribusi</h1>
  <div class="flex justify-end mb-4">
    <a href="{{ url('dashboard/distribution/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Tambah Distribusi</a>
  </div>
  <div class="overflow-x-auto mt-6">
    <table id="distributionTable" class="min-w-full bg-white border border-gray-300">
      <thead class="border-b border-gray-300">
        <tr>
          <th class="py-2 px-4 border border-gray-300">No</th>
          <th class="py-2 px-4 border border-gray-300">Aksi</th>
          <th class="py-2 px-4 border border-gray-300">Nama Toko</th>
          <th class="py-2 px-4 border border-gray-300">Foto Toko</th>
          <th class="py-2 px-4 border border-gray-300">Brand</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($distribution as $index => $dstb)
        <tr class="text-center hover:bg-gray-100 border-b border-gray-300">
          <td class="py-2 px-4 border border-gray-300">{{ $index + 1 }}</td>
          <td class="py-2 px-4 border border-gray-300">
            <div class="flex justify-center space-x-2">
              <a href="{{ url('dashboard/distribution/' . $dstb->id . '/edit') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-2 rounded" title="Edit">
                <i class="fa-regular fa-pen-to-square"></i>
              </a>
              <form action="{{ url('dashboard/distribution/' . $dstb->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Delete">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </form>
            </div>
          </td>
          <td class="py-2 px-4 border border-gray-300">{{ $dstb->namatoko }}</td>
          <td class="py-2 px-4 border border-gray-300">
            <img src="{{ $dstb->fototoko }}" class="w-12 h-12 object-cover rounded" alt="fototoko">
          </td>
          <td class="py-2 px-4 border border-gray-300">{{ $dstb->brand }}</td>
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
      $('#distributionTable').DataTable({
          columnDefs: [{
              targets: '_all', // Mengatur seluruh kolom
              className: 'dt-head-center dt-body-center' // Menyelaraskan seluruh kolom di tengah
          }],
          "language": {
              "search": "Cari:",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecords": "Tidak ada data yang ditemukan",
              "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
              "infoEmpty": "Tidak ada data tersedia",
              "infoFiltered": "(disaring dari _MAX_ total data)"
          },
      });
  });
</script>
@endsection
