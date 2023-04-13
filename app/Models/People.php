<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pessoa extends Model
{
    use HasFactory;


    protected $fillable=[
        'id',
        'name',
        'tipo_id',
        'email',
        'password',
    ];

}
