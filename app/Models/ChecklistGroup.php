<?php

namespace App\Models;

use App\Models\Checklist;
use App\Models\ChecklistItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChecklistGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
    ];


    public function checklistItems()
    {
        return $this->hasMany(ChecklistItems::class);
    }

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
