<?php

namespace App\Models;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BudgetFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_id',
        'path'
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

}
