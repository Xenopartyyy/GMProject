<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Http\Controllers\Controller;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('testimoni.testimoni', compact('testimoni'))->with('testimoni', $testimoni);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimoni.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namacust' => 'required|unique:testimonis,namacust|max:255|min:5',
            'bintang' => 'required|between:1,5',
            'review' => 'required',
            'status' => 'nullable'
        ]);
        
        $testimoni = new Testimoni();
        $testimoni->namacust = $validatedData['namacust'];
        $testimoni->bintang = $validatedData['bintang'];
        $testimoni->review = $validatedData['review'];
            
        $testimoni->save();

        return redirect('/dashboard/testimoni');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namacust' => 'required|max:255|min:5',
            'bintang' => 'required|between:1,5',
            'review' => 'required',
            'status' => 'nullable'
        ]);
        
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->namacust = $validatedData['namacust'];
        $testimoni->bintang = $validatedData['bintang'];
        $testimoni->review = $validatedData['review'];
            
        $testimoni->save();

        return redirect('/dashboard/testimoni');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect('/dashboard/testimoni');

    }
}
