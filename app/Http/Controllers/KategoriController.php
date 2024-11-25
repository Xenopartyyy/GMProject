<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.kategori', compact('kategori'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kdktg' => 'required|unique:kategoris',
            'nmkategori' => 'required|unique:kategoris',
            'status' => 'nullable'
        ]);
        
        $kategori = new Kategori();
        $kategori->kdktg = $validatedData['kdktg'];
        $kategori->nmkategori = $validatedData['nmkategori'];
            
        $kategori->save();

        return redirect('/dashboard/kategori');
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
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
        return view('kategori.edit');
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
            'kdktg' => 'required|unique:kategoris',
            'nmkategori' => 'required|unique:kategoris',
            'status' => 'nullable'
        ]);
        
        $kategori = Kategori::findOrFail($id);
        $kategori->kdktg = $validatedData['kdktg'];
        $kategori->nmkategori = $validatedData['nmkategori'];
            
        $kategori->save();

        return redirect('/dashboard/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/dashboard/kategori');
    }
}
