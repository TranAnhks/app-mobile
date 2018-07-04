<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Oder;
use App\Models\Product;
use App\Models\Oder_detail;
use Session;
use DateTime;
use DB;
use App\Repositories\Contracts\OrderInterface;

class OrderController extends Controller
{
    
    protected $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->middleware('auth:admin');

        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        //
        $pages = $this->orderRepository->pageoderad();

        return $pages;
    }

    public function getdetail($id)
    {
        $pages = $this->orderRepository->pageorderdetailad($id);

        return $pages;    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = $this->orderRepository->pagecreatead();

        return $pages;
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
        $pages = $this->orderRepository->pageeditad($id);

        return $pages;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $pages = $this->orderRepository->pageupdatead($id);

        return $pages;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = $this->orderRepository->pagedestroyad($id);

        return $pages;
    }
}
