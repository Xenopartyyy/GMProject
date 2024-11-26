<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\About;
use App\Models\Testimoni;
use App\Models\Distribution;
use App\Models\Brand;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $slide = Slider::all();
        $about = About::all();
        $testimoni = Testimoni::all();
        $distribution = Distribution::all();
        $perusahaan = Perusahaan::all();
        $brand = Brand::all();
    
        return view("beranda", compact('slide', 'about', 'testimoni', 'distribution', 'brand', 'perusahaan'));
    }
    
    
    


}
    