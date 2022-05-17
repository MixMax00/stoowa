<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentCategory extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'parent_category_name',
        'description',
        'parent_cat_img',
        'slug',
        'status'
    ];

    
}
