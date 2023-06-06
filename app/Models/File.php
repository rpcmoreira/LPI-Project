<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* `class File extends Model` is defining a PHP class named `File` that extends the `Model` class
provided by the Laravel framework. This means that the `File` class inherits all the properties and
methods of the `Model` class, and can also define its own properties and methods. The `File` class
is used to represent a database table named `files`, and provides an interface for interacting with
the table's data using Laravel's Eloquent ORM. */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'file',
        'projeto_id'
    ];
    public $timestamps = false;
}
