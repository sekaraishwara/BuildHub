<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerChecklistItems extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function checklist()
    {
        return $this->belongsTo(CustomerChecklist::class, 'user_id');
    }
}
