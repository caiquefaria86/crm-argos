<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UploadFileContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'type',
        'path'
    ];


    public function contact()
    {
        return $this->belongTo(Contact::class);
    }
}
