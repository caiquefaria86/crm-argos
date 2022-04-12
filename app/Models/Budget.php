<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Moldels\Contact;

class Budget extends Model
{
    use HasFactory;

    protected $filable = [
        'contact_id',
        'roof_type',
        'budget_type',
        'conta_energia',
        'media_kwh',
        'media_valor',
    ];

    public function contact()
    {
        return $this->belongsTo(contact::class);
    }
}
