<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Brand;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with(['kategori', 'brand'])->get();
        $perusahaan = Perusahaan::all();
        return view('produk.produk', compact('produks', 'perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $brands = Brand::all();
        return view('produk.create', compact('kategoris', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'noart' => 'required|unique:produks',
            'kategori_id' => 'required|exists:kategoris,id',
            'brands_id' => 'required|exists:brands,id',
            'nmbrg' => 'required',
            'fotobrg.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'ukbrg' => 'required|array',
            'ukbrg.*' => 'in:S,M,L,XL,XXL,3L,4L',
            'deskbrg' => 'required',
            'hrgbrg' => 'required|numeric',
            'stokbrg' => 'required',
            'link_shopee' => 'nullable|url',
            'link_tokped' => 'nullable|url',
            'link_ttshop' => 'nullable|url',
        ]);

        $produk = new Produk();
        $produk->noart = $validatedData['noart'];
        $produk->kategori_id = $validatedData['kategori_id'];
        $produk->brands_id = $validatedData['brands_id'];
        $produk->nmbrg = $validatedData['nmbrg'];
        $produk->ukbrg = implode(',', $validatedData['ukbrg']);
        $produk->deskbrg = $validatedData['deskbrg'];
        $produk->hrgbrg = $validatedData['hrgbrg'];
        $produk->stokbrg = $validatedData['stokbrg'];
        $produk->link_shopee = $validatedData['link_shopee'];
        $produk->link_tokped = $validatedData['link_tokped'];
        $produk->link_ttshop = $validatedData['link_ttshop'];

        // Handle multiple image uploads
        $uploadedImages = [];
        if ($request->hasFile('fotobrg')) {
            foreach ($request->file('fotobrg') as $file) {
                $fileContent = file_get_contents($file->getRealPath());
                $uploadedImages[] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
            }
        }

        $produk->fotobrg = json_encode($uploadedImages); // Save as JSON array of base64 URIs
        $produk->save();

        return redirect('/dashboard/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::with('kategori', 'brand')->findOrFail($id);
        $perusahaan = Perusahaan::all();
        $brand = Brand::all();
        return view('detail', compact('produk', 'perusahaan', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        // Ensure fotobrg is an array
        $produk->fotobrg = $produk->fotobrg ? json_decode($produk->fotobrg, true) : [];
        $produk->ukbrg = $produk->ukbrg ? explode(',', $produk->ukbrg) : [];
        $kategoris = Kategori::all();
        $brands = Brand::all();

        return view('produk.edit', compact('produk', 'kategoris', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'noart' => 'required|unique:produks,noart,' . $id,
            'kategori_id' => 'required|exists:kategoris,id',
            'brands_id' => 'required|exists:brands,id',
            'nmbrg' => 'required',
            'fotobrg.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'ukbrg' => 'required|array',
            'ukbrg.*' => 'in:S,M,L,XL,XXL,3L,4L',
            'deskbrg' => 'required',
            'hrgbrg' => 'required|numeric',
            'stokbrg' => 'required',
            'link_shopee' => 'nullable|url',
            'link_tokped' => 'nullable|url',
            'link_ttshop' => 'nullable|url',
        ]);
        
        // Cari produk yang akan diupdate
        $produk = Produk::findOrFail($id);
        $produk->noart = $validatedData['noart'];
        $produk->kategori_id = $validatedData['kategori_id'];
        $produk->brands_id = $validatedData['brands_id'];
        $produk->nmbrg = $validatedData['nmbrg'];
        $produk->ukbrg = implode(',', $validatedData['ukbrg']);
        $produk->deskbrg = $validatedData['deskbrg'];
        $produk->hrgbrg = $validatedData['hrgbrg'];
        $produk->stokbrg = $validatedData['stokbrg'];
        $produk->link_shopee = $validatedData['link_shopee'];
        $produk->link_tokped = $validatedData['link_tokped'];
        $produk->link_ttshop = $validatedData['link_ttshop'];
    
        // Ambil gambar yang sudah ada (dalam bentuk array)
        $existingImages = json_decode($produk->fotobrg, true) ?? [];
    
        // Menangani gambar yang dihapus
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images'); // Gambar yang dihapus
            // Menghapus gambar yang dihapus dari array existingImages
            $existingImages = array_diff($existingImages, $deletedImages);
        }
    
        // Menangani gambar baru yang diupload
        if ($request->hasFile('fotobrg')) {
            foreach ($request->file('fotobrg') as $file) {
                $fileContent = file_get_contents($file->getRealPath());
                $existingImages[] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
            }
        }
    
        // Update gambar dalam produk (simpan dalam bentuk JSON)
        $produk->fotobrg = json_encode(array_values($existingImages));
        $produk->save();
    
        return redirect('/dashboard/produk');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $fotobrgPaths = json_decode($produk->fotobrg, true) ?? [];
        foreach ($fotobrgPaths as $file) {
            // No need to delete files as we are storing base64 URIs
        }

        $produk->delete();

        return redirect('/dashboard/produk');
    }
}
