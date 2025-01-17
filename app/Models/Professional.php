<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'category_professional_id',
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
        return $this->hasMany(ProfessionalService::class);
    }
}
