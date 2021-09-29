<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'product_content','user_id','product_category_id','product_subcategory_id','image1','image2','image3','image4'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product_category()
    {
        return $this->belongsTo('App\Product_category');
    }
    public function product_subcategory()
    {
        return $this->belongsTo('App\Product_subcategory');
    }
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
