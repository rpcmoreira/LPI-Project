<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'proponente_id',
        'coordenador_id',
        'objetivo',
        'metodos',
        'data_id',
        'data_final_id',
        'area_id',
        'curso_id',
        'estudo_id',
        'estado_id',
        'aprovacao'
    ];

    public $timestamps = false;
}
