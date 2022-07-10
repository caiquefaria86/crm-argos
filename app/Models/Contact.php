<?php

namespace App\Models;

use App\Models\User;
use App\Models\Budget;
use App\Models\Comment;
use App\Models\BudgetSent;
use App\Models\tagContacts;
use App\Models\TargetPeople;
use App\Models\UploadFileContact;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    // status 	name 	cellphone 	city 	email 	origin 	responsibleOffice

    protected $filable = [
        'user_id',
        'status',
        'name',
        'cellphone',
        'city',
        'email',
        'origin',
        'responsibleOffice',
        'formPayments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'contact_id', 'id');
    }

    public function budgetsSents()
    {
        return $this->hasMany(BudgetSent::class, 'contactId', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'contactId', 'id');
    }

    public function tags()
    {
        return $this->hasMany(tagContacts::class);
    }

    public function targetPeoples()
    {
        return $this->hasMany(TargetPeople::class, 'contact_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function uploadFile()
    {
        return $this->hasMany(UploadFileContact::class);
    }

}
