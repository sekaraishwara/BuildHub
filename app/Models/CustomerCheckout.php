<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCheckout extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function carts()
    // {
    //     return $this->belongsToMany(CustomerCart::class);
    // }
    protected $casts = [
        'cart_id' => 'array'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function items()
    {
        return $this->hasMany(CustomerCheckoutItem::class, 'checkout_id');
    }
}
