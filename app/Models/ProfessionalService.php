<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfessionalService extends Model
{
    use Sluggable;
    use HasFactory;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class, 'professional_id');
    }

    //added 9/5/24
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProfessionalCategory::class);
    }
}
