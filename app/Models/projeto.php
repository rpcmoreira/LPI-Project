<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* The `class projeto extends Model` is defining a model class named `projeto` that extends the `Model`
class provided by the Laravel framework. This allows the `projeto` class to inherit all the
properties and methods of the `Model` class, which provides an easy way to interact with the
database using Eloquent ORM. The `` property is used to specify which attributes of the
`projeto` model can be mass-assigned, while the `` property is used to disable the
automatic timestamping of the `created_at` and `updated_at` fields. */
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
        'aprovacao',
        'relator_id'
    ];

    public $timestamps = false;
}
