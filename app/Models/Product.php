<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_title',
        'user_id ',
        'slug',
        'sku',
        'price',
        'sale_price',
        'quantity',
        'short_description',
        'description',
        'product_iamge',
        'status',
        'add_info',
    ];



    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function colors(){
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
    public function sizes(){
        return $this->belongsToMany(Size::class)->withTimestamps();
    }

    public function galleres(){
        return $this->hasMany(ProductGallery::class);
    }
}
