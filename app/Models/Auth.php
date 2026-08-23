<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    protected $table = 'auths';

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
    ];
}
