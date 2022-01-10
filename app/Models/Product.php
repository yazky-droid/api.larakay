<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function (Product $product) {
             $product->slug = strtolower(Str::slug($product->name. '-'. time()));
            });
    }

    protected $guarded = [];

    public function getRouteKeyName() //untuk mengatur wildcardnya nanti di route biar gapake id tapi pake slug sekarang mah:)
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

