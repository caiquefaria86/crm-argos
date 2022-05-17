<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'responsibleOffice',
    'contact_id'
    ];

}
