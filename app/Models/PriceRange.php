<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceRange extends Model
{
    use HasFactory;

    protected $table = 'price_ranges';

    public function professionals(): HasMany
    {
        return $this->hasMany(ProfessionalService::class);
    }
    public function vendors(): HasMany
    {
        return $this->hasMany(VendorService::class);
    }
}
