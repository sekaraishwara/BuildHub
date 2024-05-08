<?php

namespace App\Models;

use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regencie extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'province_id'];

    function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
