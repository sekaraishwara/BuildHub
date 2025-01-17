<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function stores(): HasMany
    {
        return $this->hasMany(StoreProduct::class);
    }
}
