<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    protected $table ='product_details';
    
	protected $guarded = [
		'id',
		'cpu',
		'ram',
		'screen',
		'storage',
		'exten_memmory',
		'cam1',
		'cam2',
		'sim',
		'pin',
		'os',
		'product_id'
	];
}

 