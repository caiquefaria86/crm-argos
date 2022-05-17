<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $filable = [
        'message',
        'contactId',
        'userId'
    ];



    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
