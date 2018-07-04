<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    //
   // protected $table ='oders';
	protected $fillable = [
		'total', 
		'status', 
		'user_id', 
		'verifyToken',
	];

	//protected $guarded =[];
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	public function products()
	{
		//return $this->belongsToMany('App\Product')->withPivot('quantity', 'total')->withTimestamps();
	    return $this->belongsToMany('App\Models\Product')->withPivot('quantity','total')->withTimestamps();

	}
}
