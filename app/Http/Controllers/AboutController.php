<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('about.about', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ttgkami' => 'required',
            'fotottg' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'timkami' => 'required',
            'fototim' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'status' => 'nullable'
        ]);

        $about = new About();
        $about->ttgkami = $validatedData['ttgkami'];
        $about->timkami = $validatedData['timkami'];

        // Convert fotottg to Base64
        if ($request->hasFile('fotottg') && $request->file('fotottg')->isValid()) {
            $file = $request->file('fotottg');
            $fileContent = file_get_contents($file->getRealPath());
            $about->fotottg = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        // Convert fototim to Base64
        if ($request->hasFile('fototim') && $request->file('fototim')->isValid()) {
            $file = $request->file('fototim');
            $fileContent = file_get_contents($file->getRealPath());
            $about->fototim = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        $about->save();

        return redirect('/dashboard/about');
    }


    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        // Show single about
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ttgkami' => 'required',
            'fotottg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'timkami' => 'required',
            'fototim' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'status' => 'nullable'
        ]);

        $about = About::findOrFail($id);
        $about->ttgkami = $validatedData['ttgkami'];
        $about->timkami = $validatedData['timkami'];

        // Update fotottg if provided
        if ($request->hasFile('fotottg')) {
            $file = $request->file('fotottg');
            $fileContent = file_get_contents($file->getRealPath());
            $about->fotottg = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        // Update fototim if provided
        if ($request->hasFile('fototim')) {
            $file = $request->file('fototim');
            $fileContent = file_get_contents($file->getRealPath());
            $about->fototim = 'data:' . $file->getMimeType() . ';base64,' . base64_encode($fileContent);
        }

        $about->save();

        return redirect('/dashboard/about');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // Hapus foto jika ada
        $fotottgPath = public_path('storage/fotottg/' . $about->fotottg);
        if (File::exists($fotottgPath)) {
            File::delete($fotottgPath);
        }

        $fototimPath = public_path('storage/fototim/' . $about->fototim);
        if (File::exists($fototimPath)) {
            File::delete($fototimPath);
        }

        $about->delete();

        return redirect('/dashboard/about');
    }
}
