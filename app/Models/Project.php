<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_fechamento',
        'type',
        'tipoInversor',
        'qtd_inversores',
        'tamanhoInversor',
        'valor_material',
        'valor_instalacao',
        'valor_total',
        'tipo_pagamento',
        'entrada',
        'qtd_parcelas',
        'status',
        'client_id'
    ];
}
