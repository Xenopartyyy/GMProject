<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgreeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KopralController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\BrandCategoryController;


Route::get('/contact', function () {
    return view('kontak');
});

Route::get('/agree', [AgreeController::class, 'index']);
Route::get('/kopral', [KopralController::class, 'index']);
Route::get('/sem', [SemController::class, 'index']);

Route::get('/hidden-pathway-9348-akun', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/hidden-pathway-9348-akun', [RegisterController::class, 'register'])->name('register');

Route::get('/login/akun/web/greatmale', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/akun/web/greatmale', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [MainController::class, 'index']);

// ;

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');

Route::get('/katalog/produk/{id}', [ProdukController::class, 'show'])->name('detail');



   
Route::prefix('dashboard')->group(function () {
    
    Route::get('/web/greatmale', function () {
        return view('dashboard');
    })->middleware('auth');
        

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [SliderController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [SliderController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [SliderController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [SliderController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [AboutController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [AboutController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [AboutController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [AboutController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [AboutController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('testimoni')->group(function () {
        Route::get('/', [TestimoniController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [TestimoniController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [TestimoniController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [TestimoniController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [TestimoniController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [TestimoniController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('distribution')->group(function () {
        Route::get('/', [DistributionController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [DistributionController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [DistributionController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [DistributionController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [DistributionController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [DistributionController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [BrandController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [BrandController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [BrandController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [BrandController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [BrandController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [KategoriController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [KategoriController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [KategoriController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('brandcategory')->group(function () {
        Route::get('/', [BrandCategoryController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [BrandCategoryController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [BrandCategoryController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [BrandCategoryController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [BrandCategoryController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [BrandCategoryController::class, 'destroy'])->middleware('auth'); 
    });

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->middleware('auth'); 
        Route::get('/create', [ProdukController::class, 'create'])->middleware('auth'); 
        Route::post('/store', [ProdukController::class, 'store'])->middleware('auth');
        Route::get('/{id}/edit', [ProdukController::class, 'edit'])->middleware('auth'); 
        Route::put('/{id}', [ProdukController::class, 'update'])->middleware('auth');
        Route::delete('/{id}', [ProdukController::class, 'destroy'])->middleware('auth'); 
    });
});

