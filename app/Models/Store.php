<?php

namespace App\Models;

use App\Models\StoreProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'category_store_id',
        'desc',
        'instagram',
        'facebook',
        'email',
        'phone',
        'alamat',
        'kota',
        'provinsi',
        'kodepos',
    ];

    public function products()
    {
        return $this->hasMany(StoreProduct::class);
    }
}
