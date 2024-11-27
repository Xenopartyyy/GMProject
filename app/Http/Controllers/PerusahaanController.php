<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Brand;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('perusahaan.perusahaan', compact('perusahaan'));

    }

    public function indexContact()
    {
        $perusahaan = Perusahaan::all();
        $brand = Brand::all();
        return view('kontak', compact('perusahaan', 'brand'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nmperusahaan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'descsingkat' => 'required',
        ]);
        
        $perusahaan = new Perusahaan();
        $perusahaan->nmperusahaan = $validatedData['nmperusahaan'];
        $perusahaan->alamat = $validatedData['alamat'];
        $perusahaan->telp = $validatedData['telp'];
        $perusahaan->email = $validatedData['email'];
        $perusahaan->descsingkat = $validatedData['descsingkat'];
            
        $perusahaan->save();

        return redirect('/dashboard/perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::find($id);
        return view('perusahaan.edit', compact('perusahaan'));
        return view('perusahaan.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nmperusahaan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'descsingkat' => 'required',
        ]);
        
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->nmperusahaan = $validatedData['nmperusahaan'];
        $perusahaan->alamat = $validatedData['alamat'];
        $perusahaan->telp = $validatedData['telp'];
        $perusahaan->email = $validatedData['email'];
        $perusahaan->descsingkat = $validatedData['descsingkat'];
            
        $perusahaan->save();

        return redirect('/dashboard/perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return redirect('/dashboard/perusahaan');
    }
}
