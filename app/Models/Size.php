<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Size extends Model
{
    use HasFactory;
    use softDeletes;


    protected $fillable = [
        'size_name',
        'status'
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
