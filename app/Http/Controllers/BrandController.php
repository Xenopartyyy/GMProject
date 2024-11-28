<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        return view('brand.brand', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namabrand' => 'required',
            'fotobrand' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'deskripsibrand' => 'required',
            'descsingkatbrand' => 'required',
            'status' => 'nullable',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi,mkv|max:40960',
            'linktree' => 'nullable',

        ]);

        $brand = new Brand();
        $brand->namabrand = $validatedData['namabrand'];
        $brand->deskripsibrand = $validatedData['deskripsibrand'];
        $brand->descsingkatbrand = $validatedData['descsingkatbrand'];

        // Convert fotobrand to Base64
        if ($request->hasFile('fotobrand') && $request->file('fotobrand')->isValid()) {
            $file = $request->file('fotobrand');
            $fileContent = file_get_contents($file->getRealPath());
            $brand->fotobrand = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        // Convert media to Base64
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $file = $request->file('media');
            $fileContent = file_get_contents($file->getRealPath());
            $brand->media = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        $brand->save();

        return redirect('/dashboard/brand');
    }


    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        // Show single brand
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namabrand' => 'required',
            'fotobrand' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'deskripsibrand' => 'required',
            'descsingkatbrand' => 'required',
            'status' => 'nullable',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi,mkv|max:40960',
            'linktree' => 'nullable',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->namabrand = $validatedData['namabrand'];
        $brand->deskripsibrand = $validatedData['deskripsibrand'];
        $brand->descsingkatbrand = $validatedData['descsingkatbrand'];

        // Update fotobrand if provided
        if ($request->hasFile('fotobrand')) {
            $file = $request->file('fotobrand');
            $fileContent = file_get_contents($file->getRealPath());
            $brand->fotobrand = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        // Update media if provided
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileContent = file_get_contents($file->getRealPath());
            $brand->media = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        $brand->save();

        return redirect('/dashboard/brand');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = brand::findOrFail($id);

        // Hapus foto jika ada
        $fotobrandPath = public_path('storage/fotobrand/' . $brand->fotobrand);
        if (File::exists($fotobrandPath)) {
            File::delete($fotobrandPath);
        }

        $brand->delete();

        return redirect('/dashboard/brand');
    }
}
