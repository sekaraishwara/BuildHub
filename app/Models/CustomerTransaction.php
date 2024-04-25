<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cart()
    {
        return $this->belongsTo(CustomerCart::class, 'cart_id');
    }
}
