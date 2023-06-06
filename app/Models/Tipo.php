<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* `class Tipo extends Model` is defining a new class called `Tipo` that extends the `Model` class
provided by the Laravel framework. This new class represents a database table called `tipos` and
provides methods to interact with it. The `protected ` property specifies which attributes
of the `Tipo` model can be mass-assigned, and the `` property indicates whether the
`created_at` and `updated_at` columns should be automatically managed by Laravel. */
class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];
    public $timestamps = false;
}
