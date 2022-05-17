<?php

namespace App\Models;

use App\Models\Checklist;
use App\Models\ChecklistItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'checklistItem_id',
        'contact_id',
        'status',
        'user_id'
    ];


    public function checklistItem()
    {
        return $this->belongsTo(ChecklistItems::class);
    }
}
