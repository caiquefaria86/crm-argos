<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagContacts extends Model
{
    use HasFactory;


    protected $filable = [
        'text',
        'color',
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongTo(Contact::class);
    }
}
