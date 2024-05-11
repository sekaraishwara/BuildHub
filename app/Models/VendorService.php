<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    //added 9/5/24
    public function category(): BelongsTo
    {
        return $this->belongsTo(VendorCategory::class);
    }
    //added 9/5/24
    public function price(): BelongsTo
    {
        return $this->belongsTo(PriceRange::class);
    }
}
