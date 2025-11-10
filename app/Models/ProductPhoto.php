<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductPhoto extends Model
{
     protected $fillable = ['product_id', 'photo_path', 'is_main'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}