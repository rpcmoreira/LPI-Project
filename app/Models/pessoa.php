<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pessoa extends Model
{
    use HasFactory;

    $table->id();
    $table->string('name');
    $table->unsignedBigInteger('tipo_id')->default(2);
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamp('email_verified_at')->nullable();

    protected $fillable=[
        'id',
        'name',
        'tipo_id',
        'email',
        'password',
    ];

}
