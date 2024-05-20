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

    public function transactions()
    {
        return $this->hasMany(CustomerTransaction::class, 'customer_id');
    }

    public function reviews()
    {
        return $this->hasMany(CustomerReview::class, 'customer_id');
    }

    public function serviceReviews()
    {
        return $this->hasMany(CustomerServiceReview::class, 'email_client');
    }
}
