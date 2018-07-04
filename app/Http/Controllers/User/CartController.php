<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Oder;
use Cart,Datetime;
use App\Repositories\Contracts\CartInterface;

class CartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    // Pages - Giỏ hàng
    public function getcart()
    {   
        $pages = $this->cartRepository->pageCart();

        return $pages;
    }
    // Thêm giỏ hàng
    public function addcart($id)
    {
        $pages = $this->cartRepository->pageaddcart($id);    

        return $pages; 
    }
    // Update giỏ hàng (tăng số lượng)
    public function getupdatecart($id,$qty,$dk)
    {
        $pages = $this->cartRepository->pageupdatecart($id,$qty,$dk);    

        return $pages;
    }
    
    public function getdeletecart($id)
    {
        $pages = $this->cartRepository->pagedeletecart($id);    

        return $pages;
    }

    public function xoa()
    {
        $pages = $this->cartRepository->pagexoa();    

        return $pages;
    }
}
