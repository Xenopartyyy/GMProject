<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\BrandCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class KopralController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        $kategori = Kategori::all();
        $produk = Produk::all();
        $brand_category = BrandCategory::with('brand', 'kategori')->get();
        return view('kopral', compact("brand_category", "brand", "kategori", "produk"));
    }

}
