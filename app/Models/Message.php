<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* `class Message extends Model` is defining a PHP class named `Message` that extends the `Model` class
provided by the Laravel framework. This means that the `Message` class inherits all the properties
and methods of the `Model` class, and can also define its own properties and methods. The `Model`
class provides a convenient way to interact with a database table, and by extending it, the
`Message` class can represent a specific table in the database and perform CRUD (Create, Read,
Update, Delete) operations on it. */
class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'projeto_id',
        'estado_id',
        'type'
    ];
    public $timestamps = false;
}
