<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceReview extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_no', 'client_email', 'service_name', 'rating', 'comment'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'client_email');
    }

    public function transaction()
    {
        return $this->belongsTo(CustomerTransaction::class, 'inovice_no');
    }

    public function professionalService()
    {
        return $this->belongsTo(ProfessionalService::class);
    }
}
