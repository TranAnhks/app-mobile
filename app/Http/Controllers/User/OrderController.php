<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Oder;
use App\Models\Oder_products;
use DB,Cart,Datetime;
use Session;
use App\Mail\OrderShipped;
use App\User;
use Mail;
use Auth;
use App\Repositories\Contracts\OrderInterface;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    // xác nhận chi tiết đơn hàng
    public function getoder()
    {
        $pages = $this->orderRepository->pageoder();

        return $pages;
    }

    public function postoder(Request $request)
    {
       
        $pages = $this->orderRepository->pagepostoder($request);

        return $pages;
        
    }
    public function sendEmail($thisUser)
    {
        $pages = $this->orderRepository->pagesendEmail($thisUser);

        return $pages;
    }

    public function verifyEmailFirst()
    {
        $pages = $this->orderRepository->pageverifyEmailFirst();

        return $pages;
    }

    public function sendEmailDoneOder($verifyToken)
    {
        $pages = $this->orderRepository->pagesendEmailDoneOder($verifyToken);

        return $pages;
    }
    
}
