<?php

namespace App\Models;

use App\Models\Cupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplyCoupon extends Model
{
    use HasFactory;

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'use_date' => 'datetime',
    ];

    public function coupon(){
        return $this->belongsTo(Cupon::class);
    }
}
