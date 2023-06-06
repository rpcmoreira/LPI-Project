<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

/* The `class User` is extending the `Authenticatable` class and implementing the `MustVerifyEmail`
interface. This means that the `User` class is a model that represents a user in the application and
it inherits all the authentication and authorization functionalities provided by the
`Authenticatable` class. Additionally, it implements the `MustVerifyEmail` interface which requires
the user to verify their email address before being able to access certain features of the
application. */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'client_id',
        'email_verified_at',
        'tipo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   /* protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
    public $timestamps = false;
}