<?php

namespace App\Models;

use App\Models\Project;
use App\Models\UploadFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
    'type',
    'name',
    'cpf',
    'rg',
    'cep',
    'rua',
    'numero',
    'bairro',
    'cidade',
    'cellphone',
    'email',
    'origin',
    'contact_id'
    ];

    public function uploadFiles()
    {
        $this->hasMany(UploadFiles::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
