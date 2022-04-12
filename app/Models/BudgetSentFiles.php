<?php

namespace App\Models;

use App\Models\BudgetSent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class budgetSentFiles extends Model
{
    use HasFactory;
    protected $table = 'budget_sent_files';

    protected $filable = [
        'budget_sent',
        'path'
    ];

    public function budgetSent()
    {
        return $this->belongsTo(BudgetSent::class);
    }
}
