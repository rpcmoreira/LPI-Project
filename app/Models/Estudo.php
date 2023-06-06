<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* `class Estudo extends Model` is defining a PHP class named `Estudo` that extends the `Model` class
provided by the Laravel framework. This allows the `Estudo` class to inherit all the properties and
methods of the `Model` class, which provides functionality for interacting with a database table. */
class Estudo extends Model
{
    use HasFactory;
}
