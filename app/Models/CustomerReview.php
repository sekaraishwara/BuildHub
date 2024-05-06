<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_no', 'customer_id', 'product_id', 'rating', 'comment'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function transaction()
    {
        return $this->belongsTo(CustomerTransaction::class, 'inovice_no');
    }

    public function product()
    {
        return $this->belongsTo(StoreProduct::class);
    }
}
