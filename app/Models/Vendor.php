<?php

namespace App\Models;

use App\Models\VendorCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'category_vendor_id',
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

    public function services()
    {
        return $this->hasMany(VendorService::class);
    }
}
