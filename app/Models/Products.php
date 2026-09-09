<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'seller_id',
        'productname',
        'description',
        'productprice',
        'category_id',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function cart(){
        return $this->hasMany(cart::class);
    }

}
