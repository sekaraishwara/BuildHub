<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(StoreProduct::class, 'product_id');
    }

    public function transaction()
    {
        return $this->hasOne(CustomerTransaction::class, 'cart_id');
    }
}
