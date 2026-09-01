<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    protected $table = 'buyers';

    protected $fillable = [
        'user_id',          
        'phone_number',
        'shipping_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
