<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beneficiary extends Model
{
    use HasFactory;


    protected $fillable = [
        'project_id',
        'client_id',
        'name',
        'path'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
