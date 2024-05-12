<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'id');
    }



    public function messages()
    {
        return $this->hasMany(Messages::class);
    }
}
