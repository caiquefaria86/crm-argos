<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Beneficiary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
