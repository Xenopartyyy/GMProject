<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\Brand;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        $kategori = Kategori::all();
        $brand_category = BrandCategory::with('brand', 'kategori')->get();
        return view('brand_category.brand_category', compact("brand_category", "brand", "kategori"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $brands = Brand::all();
        return view('brand_category.create', compact("kategoris", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'brands_id' => 'required|exists:brands,id',
            'fotocatbrands' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'descatbrands' => 'required|string'
        ]);

        $brand_category = new BrandCategory();
        $brand_category->kategori_id = $validatedData['kategori_id'];
        $brand_category->brands_id = $validatedData['brands_id'];
        $brand_category->descatbrands = $validatedData['descatbrands'];

        if ($request->hasFile('fotocatbrands') && $request->file('fotocatbrands')->isValid()) {
            $file = $request->file('fotocatbrands');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fotocatbrands'), $filename);
            $brand_category->fotocatbrands = $filename;
        }

        $brand_category->save();

        return redirect('/dashboard/brandcategory');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand_category = BrandCategory::findOrFail($id);
        $kategoris = Kategori::all();
        $brands = Brand::all();
        return view('brand_category.edit', compact('brand_category', 'kategoris', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'brands_id' => 'required|exists:brands,id',
            'fotocatbrands' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'descatbrands' => 'required|string'
        ]);

        $brand_category = BrandCategory::findOrFail($id);
        $brand_category->kategori_id = $validatedData['kategori_id'];
        $brand_category->brands_id = $validatedData['brands_id'];
        $brand_category->descatbrands = $validatedData['descatbrands'];

        if ($request->hasFile('fotocatbrands')) {
            $oldFile = public_path('storage/fotocatbrands/' . $brand_category->fotocatbrands);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('fotocatbrands');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fotocatbrands'), $filename);
            $brand_category->fotocatbrands = $filename;
        }

        $brand_category->save();

        return redirect('/dashboard/brandcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand_category = BrandCategory::findOrFail($id);

        // Hapus foto jika ada
        $fotocatbrandsPath = public_path('storage/fotocatbrands/' . $brand_category->fotocatbrands);
        if (File::exists($fotocatbrandsPath)) {
            File::delete($fotocatbrandsPath);
        }

        $brand_category->delete();

        return redirect('/dashboard/brandcategory');
    }
}
