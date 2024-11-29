<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data filter dari request
        $noart = $request->input('noart');
        $search = $request->input('search');
        $kategori_id = $request->input('kategori');
        $brands_id = $request->input('brand');
        $stok = $request->input('stokbrg');
        $harga_min = $request->input('harga_min');
        $harga_max = $request->input('harga_max');
    
        // Query Produk dengan filter
        $query = Produk::query();
    
        // Filter berdasarkan nomor artikel  produk
        if ($noart) {
            $query->where('noart', 'like', '%' . $noart . '%');
        }

        // Filter berdasarkan nama produk
            if ($search) {
            $search = str_replace(' ', '', $search);
    
            $query->whereRaw("REPLACE(nmbrg, ' ', '') LIKE ?", ['%' . $search . '%']);
        }

    
        // Filter berdasarkan kategori
        if ($kategori_id) {
            $query->where('kategori_id', $kategori_id);
        }
    
        // Filter berdasarkan brand
        if ($brands_id) {
            $query->where('brands_id', $brands_id);
        }
    
        // Filter berdasarkan rentang harga
        if ($harga_min) {
            $query->where('hrgbrg', '>=', $harga_min);
        }
        if ($harga_max) {
            $query->where('hrgbrg', '<=', $harga_max);
        }

        if ($stok) {
            if ($stok === 'Ready') {
                $query->where('stokbrg', 'Ready'); // Filter untuk status Ready
            } elseif ($stok === 'Kosong') {
                $query->where('stokbrg', 'Kosong'); // Filter untuk status Kosong
            }
        }
        
        
        // Mendapatkan hasil query produk
        $produk = $query->paginate(8)->withQueryString();
    
        // Mendapatkan data kategori dan brand
        $brand = Brand::all();
        $kategori = Kategori::all();
        $perusahaan = Perusahaan::all();

    
        return view('katalog', compact('brand', 'kategori', 'produk', 'perusahaan'));
    }
    
}
