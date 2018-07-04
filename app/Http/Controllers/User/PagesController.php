<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Oder;
use App\Models\Oder_products;
use DB,Cart,Datetime;
use Session;
use Illuminate\Support\Str;
use Mail;
use App\Mail\OrderShipped;
use App\Models\User;
// use App\Repositories\Contracts\PagesInterface;
use App\Repositories\Contracts\PageInterface;

class PagesController extends Controller
{
    protected $pageRepository;

    public function __construct(PageInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
    public function index(Request $request)
    {
        $pages = $this->pageRepository->paginateProduct($request);

        return $pages;
    }
    //mobile
    public function getcate(Request $request)
    {
       $pages = $this->pageRepository->paginateMobile($request);

        return $pages;
    } 
    
    public function getLoaiSp(Request $request,$id) 
    {
        $pages = $this->pageRepository->paginateLoaiSp($request,$id);

        return $pages;
    }
    
    public function mobiledetail($id)
    {
        $pages = $this->pageRepository->paginatemobiledetail($id);

        return $pages;
    }
    
    public function getintro()
    {   
        $pages = $this->pageRepository->paginateintro();

        return $pages;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  
}
