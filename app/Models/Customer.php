<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
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

    public function cart()
    {
        return $this->belongsTo(CustomerCart::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
