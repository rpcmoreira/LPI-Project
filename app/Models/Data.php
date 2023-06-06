<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* `class Data extends Model` is defining a model class named `Data` that extends the `Model` class
provided by the Laravel framework. This model will be used to interact with a corresponding database
table named `data`. The `protected ` property specifies which attributes of the model can
be mass-assigned, and the `` property indicates whether the model should automatically
maintain `created_at` and `updated_at` timestamps. */
class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
    ];

    public $timestamps = false;
}
