<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\BudgetSentFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class budgetSent extends Model
{
    protected $table = "budget_sent";
    use HasFactory;
    protected $filable = [
        'date_apresentation',
        'type_apresentation'
    ];

    public function contact()
    {
        return $this->beleongsTo(Contact::class);
    }

    public function budgetSentFiles()
    {
        return $this->hasMany(BudgetSentFiles::class, 'budget_sent', 'id');
    }
}
