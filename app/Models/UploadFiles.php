<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UploadFiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'type',
        'path'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
