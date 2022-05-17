<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'category_name',
        'par_cat_id',
        'description',
        'cat_img',
        'slug',
        'status'
    ];

    public function CategoryToparCat(){
        return $this->hasMany(Category::class, 'par_cat_id', 'id');
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }


   
}
