<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    public $timestamps = false;
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'empresa',
        'codigo',
        'razao_social',
        'tipo',
        'cpf_cnpj',
    ];
}
