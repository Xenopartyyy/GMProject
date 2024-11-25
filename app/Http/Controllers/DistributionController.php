<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Distribution;

class DistributionController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribution = Distribution::all();
        return view('distribution.distribution', compact('distribution'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distribution.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namatoko' => 'required',
            'fototoko' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'brand' => 'required',
            'status' => 'nullable'
        ]);

        $distribution = new distribution();
        $distribution->namatoko = $validatedData['namatoko'];
        $distribution->brand = $validatedData['brand'];

        if ($request->hasFile('fototoko') && $request->file('fototoko')->isValid()) {
            $file = $request->file('fototoko');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fototoko'), $filename);
            $distribution->fototoko = $filename;
        }

        $distribution->save();

        return redirect('/dashboard/distribution');
    }

    /**
     * Display the specified resource.
     */
    public function show(distribution $distribution)
    {
        // Show single distribution
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $distribution = Distribution::findOrFail($id);
        return view('distribution.edit', compact('distribution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ubah validasi fototoko menjadi opsional
        $validatedData = $request->validate([
            'namatoko' => 'required',
            'fototoko' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'brand' => 'required',
            'status' => 'nullable'
        ]);
    
        $distribution = Distribution::findOrFail($id);
        $distribution->namatoko = $validatedData['namatoko'];
        $distribution->brand = $validatedData['brand'];
    
        // Hanya update foto jika ada file baru yang diunggah
        if ($request->hasFile('fototoko')) {
            $oldFile = public_path('storage/fototoko/' . $distribution->fototoko);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('fototoko');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fototoko'), $filename);
            $distribution->fototoko = $filename;
        }
    
        $distribution->save();
    
        return redirect('/dashboard/distribution');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $distribution = Distribution::findOrFail($id);

        // Hapus foto jika ada
        $fototokoPath = public_path('storage/fototoko/' . $distribution->fototoko);
        if (File::exists($fototokoPath)) {
            File::delete($fototokoPath);
        }

        $distribution->delete();

        return redirect('/dashboard/distribution');
    }
}
