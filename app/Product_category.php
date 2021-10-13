<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function product_subcategories()
    {
        return $this->hasMany('App\Product_subcategory');
    }
}
