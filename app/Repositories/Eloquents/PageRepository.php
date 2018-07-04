<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PageInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Models\Product;
use App\Models\ProductDetail;
use Session;

class PageRepository extends BaseRepository implements PageInterface
{
	public function model()			
	{
		return Product::class;
	}
	/**
	 * @param  limit
	 * @param  conditions
	 * @param  value
	 * @return Data Prodcut paginage
	 */
	public function paginateProduct($request)
	{
		$new_product = Product::where('status',1)
            ->join('product_details', 'product_details.product_id', '=', 'products.id')
            ->paginate(4);
   		if ($request->ajax()) {
        	return view('frontend.index.ajax', compact('new_product'));
        } else { 
            return view('frontend.index.home', compact('new_product'));
        }
	}

	public function paginateMobile($request)
	{
		$new_product = Product::where('status',1)
            ->join('product_details', 'product_details.product_id', '=', 'products.id')
            ->paginate(4);
     	if ($request->ajax()) {
        	return view('frontend.product.ajax', compact('new_product'));
        } else { 
            return view('frontend.product.mobile', compact('new_product'));
        }
	}

	public function paginateLoaiSp($request,$id)
	{
		$new_product = Product::where('category_id',$id)
            ->join('product_details', 'product_details.product_id', '=', 'products.id')
            ->paginate(4);
            
        if ($request->ajax()) {
        	return view('frontend.product.ajax', compact('new_product'));
        } else { 
            return view('frontend.product.mobile', compact('new_product'));
        }
     	 
        
	}

	public function paginatemobiledetail($id)
	{
		$mobile = Product::where('id',$id)->first();
        $mobile_detail = ProductDetail::where('id',$id)->first();
        
        return view ('frontend.product.mobiledetail',compact('mobile','mobile_detail'));
	}

	public function paginateintro()
	{
        return view ('frontend.intro.intro');
	}
}
