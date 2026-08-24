<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class passwordReset extends Model
{
    protected $table = 'password_resets';

    protected $fillable = [
        'email',
        'code',
        'expires_at'
    ];

    protected $casts = [
        'code' => 'integer',
        'expires_at' => 'datetime',
    ];
}
