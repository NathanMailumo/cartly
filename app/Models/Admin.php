<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = [
        'email',
        'password'
    ];
    
}
