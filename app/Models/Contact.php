<?php

namespace App\Models;

use App\Models\User;
use App\Models\Budget;
use App\Models\BudgetSent;
use Illuminate\Database\Eloquent\Model;
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


}
