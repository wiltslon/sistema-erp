<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    public $timestamps = false;
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'empresa',
        'sigla',
        'razao_social',
    ];
}
