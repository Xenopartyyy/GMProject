<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SemController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        $kategori = Kategori::all();
        $produk = Produk::all();
        $perusahaan = Perusahaan::all();
        $brand_category = BrandCategory::with('brand', 'kategori')->get();
        return view('sem', compact("brand_category", "brand", "kategori", "produk", "perusahaan"));
    }

}
