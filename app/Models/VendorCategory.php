<?php

namespace App\Models;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vendors(): HasMany
    {
        return $this->hasMany(VendorService::class);
    }
}
