<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'nome',
        'data_id',
        'instituicao_id',
        'area_id',
        'curso_id',
        'tipo_id',
    ];

}
