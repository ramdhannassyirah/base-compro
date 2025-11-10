<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Support\Facades\Storage;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price','category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

       public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function mainPhoto()
    {
        return $this->hasOne(ProductPhoto::class)->where('is_main', true);
    }

   public function getPhotosUrlAttribute()
    {
        return $this->photos->map(fn($photo) => Storage::disk('public')->url($photo->photo_path))->toArray();
    }

}