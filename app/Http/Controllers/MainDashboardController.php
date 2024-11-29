<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\BrandCategory;
use App\Models\Perusahaan;
use App\Models\Produk;
use Illuminate\Http\Request;

class MainDashboardController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        $brandcategory = BrandCategory::all();
        $produk = Produk::all();
        $perusahaan = Perusahaan::all();
        $brand = Brand::all();
    
        return view("dashboard", compact('kategori', 'brandcategory', 'produk', 'brand', 'perusahaan'));
    }

}
    