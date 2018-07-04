<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table='products'; // ke thua table
    // xac dinh cac column trong table
    protected $fillable = [
        'id',
        'name', 
        'images', 
        'promo', 
        'packet', 
        'price',
        'status', 
        'category_id',
    ];

    //khong thay doi thong tin timestamps
    //public $timestamps=false;

    public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

    public function product_detail()
    {
        return $this->hasOne('App\Models\ProductDetail');
    }

    public function oders()
    {
       // return $this->belongsToMany('App\Oder')->withPivot('quantity', 'total')->withTimestamps();
        return $this->belongsToMany('App\Models\Oder')->withTimestamps()->withPivot('quantity', 'total');
    }
}
