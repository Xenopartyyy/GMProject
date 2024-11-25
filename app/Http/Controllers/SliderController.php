<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use App\Http\Controllers\Controller;


class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('slider.slider', compact('slider'))->with('slider', $slider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            'nama' => 'required|unique:sliders,nama|max:255|min:5',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'status' => 'nullable'
        ]);

        $slider = new Slider();
        $slider->nama = $validatedData['nama'];

        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            $file = $request->file('banner');
            $fileContent = file_get_contents($file->getRealPath());
            $base64Banner = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
            $slider->banner = $base64Banner; // Simpan base64 ke database
        }

        $slider->save();

        return redirect('/dashboard/slider');
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
        $slider = Slider::findOrFail($id);
        return view('slider.edit', compact('slider'));
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
            'nama' => 'required|max:255|min:5',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'status' => 'nullable'
        ]);
    
        $slider = Slider::findOrFail($id);
        $slider->nama = $validatedData['nama'];
    
        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            $file = $request->file('banner');
            $fileContent = file_get_contents($file->getRealPath());
            $base64Banner = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
            $slider->banner = $base64Banner; // Simpan base64 ke database
        }
    
        $slider->save();
    
        return redirect('/dashboard/slider');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Hapus foto dari folder storage
        $filePath = public_path('storage/banner/' . $slider->banner);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $slider->delete();

        return redirect('/dashboard/slider');
    }
}
