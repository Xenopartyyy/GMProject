<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand_categories()
    {
        return $this->hasMany(BrandCategory::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
