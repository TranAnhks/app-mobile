<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use App\Repositories\Contracts\CustomerInterface;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $customerRepository;

    public function __construct(CustomerInterface $customerRepository)
    {
        $this->middleware('auth:admin');
        $this->customerRepository = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->customerRepository->pageindex();

        return $pages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = $this->customerRepository->pagecreate();

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
        // $data = $request->all();
        // //dd($data);
        // $data = User::insertGetId([
        //     'name' => $data['txtname'],
        //     'email' => $data['txtemail'],
        //     'password' => $data['txtpass'],
        //     'phone' => $data['txtphone'],
        //     'address'=>$data['txtaddress'],
        //     'status'=>1
        // ]);
        // //3. Trả về thông tin sau khi lưu xong
        // //return back();// giữ nguyên view này - không có message
        // Session::flash('ketqua','Luu du lieu thanh cong');
        // return redirect('admin/user');
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
        $pages = $this->customerRepository->pageedit($id);

        return $pages;
       
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
        $pages = $this->customerRepository->pageupdate($request, $id);

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
        $pages = $this->customerRepository->pagedestroycustomer($id);

        return $pages;
    }
}
