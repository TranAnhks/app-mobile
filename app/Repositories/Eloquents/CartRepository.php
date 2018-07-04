<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CartInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Models\Product;
use Cart;

class CartRepository extends BaseRepository implements CartInterface
{
    //
    public function model()			
	{
		return Product::class;
	}

	public function pagecart()
	{
	    return view ('frontend.cart.cart',compact('category'));
	}

	public function pageaddcart($id)
	{
		$pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);

        return back();
	}

    public function pageupdatecart($id,$qty,$dk)
    {
        if ($dk=='up') {
            $qt = $qty+1;
            Cart::update($id, $qt);
            return view ('frontend.cart.cart',compact('category'));
        } elseif ($dk=='down') {
            if ($qty>=2) {
                $qt = $qty-1;
                Cart::update($id, $qt);
                return view ('frontend.cart.cart',compact('category'));
            }
            else {
                $qt = $qty-0;
                Cart::update($id, $qt);
                return view ('frontend.cart.cart',compact('category'));
            }
        } else {
            return view ('frontend.cart.cart',compact('category'));
        }
    }

    // xóa sản phẩm trong cart
    public function pagedeletecart($id)
    {
        Cart::remove($id);
        return view ('frontend.cart.cart',compact('category'));
    }

    public function pagexoa()
    {
    	Cart::destroy();   
        return back();
    }
}
