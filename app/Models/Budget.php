<?php

namespace App\Models;

use App\Moldels\Contact;
use App\Models\BudgetFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    public function budgetFiles()
    {
        return $this->hasMany(BudgetFiles::class);
    }
}
