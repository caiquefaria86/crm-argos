<?php

namespace App\Models;

use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChecklistItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'checklistGroup_id',
        'text'
    ];

    public function checklistGroup()
    {
        return $this->belongsTo(ChecklistGroup::class);
    }

    public function checklist()
    {
        return $this->hasMany(Checklist::class, 'checklistItem_id', 'id');
    }

}
