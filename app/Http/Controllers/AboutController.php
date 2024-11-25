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

        // Simpan foto Tentang Kami
        if ($request->hasFile('fotottg') && $request->file('fotottg')->isValid()) {
            $file = $request->file('fotottg');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fotottg'), $filename);
            $about->fotottg = $filename;
        }

        // Simpan foto Tim Kami
        if ($request->hasFile('fototim') && $request->file('fototim')->isValid()) {
            $file = $request->file('fototim');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fototim'), $filename);
            $about->fototim = $filename;
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

        // Update foto Tentang Kami jika diunggah
        if ($request->hasFile('fotottg')) {
            $oldFile = public_path('storage/fotottg/' . $about->fotottg);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('fotottg');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fotottg'), $filename);
            $about->fotottg = $filename;
        }

        // Update foto Tim Kami jika diunggah
        if ($request->hasFile('fototim')) {
            $oldFile = public_path('storage/fototim/' . $about->fototim);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('fototim');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fototim'), $filename);
            $about->fototim = $filename;
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
