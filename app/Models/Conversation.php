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
        return $this->belongsTo(User::class, 'user1_id'); // Merujuk ke user1_id sebagai sender
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user2_id'); // Merujuk ke user2_id sebagai receiver
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }
}
