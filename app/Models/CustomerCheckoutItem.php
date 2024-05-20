<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCheckoutItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function checkout()
    {
        return $this->belongsTo(CustomerCheckout::class, 'checkout_id');
    }
}
