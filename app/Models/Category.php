<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'categoryname',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
