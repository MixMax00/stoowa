<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyShippingCharge extends Model
{
    use HasFactory;


    protected $fillable = [
        'shipping_charge_id',
        'shipping_charge'
    ];

    public function shippingCharge(){
        return $this->belongsTo(ShippingCharge::class);
    }
}
