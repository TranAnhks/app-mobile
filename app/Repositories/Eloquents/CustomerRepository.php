<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CustomerInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\User;
use Session;

class CustomerRepository extends BaseRepository implements CustomerInterface
{
    public function model()			
	{
		return User::class;
	}

	public function pageindex()
    {
        $user = User::all();
        return view('admin.customer.index',compact('user'));
    }

    public function pagecreate()
    {
        return view('admin.customer.add');
    	
    }

	public function pageedit($id)
	{
		 $user_edit = User::findOrFail($id);
        //$product_edit = Product::pluck('name','cat_id');
        //dd($product_edit);
        return view('admin.customer.edit',compact('user_edit'));
	}

	public function pageupdate($request, $id)
	{
		 //0. Check Id có tồn tại không
        $data = User::findOrFail($id);
        //1. lay du liệu view
        $update_data= $request->all();
        //2. xác định từng field trong CSDL cần cập nhật - theo view
        $data->name=$update_data['txtname']; 
        $data->email=$update_data['txtemail']; 
        $data->phone=$update_data['txtphone']; 
        $data->address=$update_data['txtaddress']; 
        //3. Lưu
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhật dữ liệu thành công');
        return redirect('admin/customer');
	}
	
	public function pagedestroycustomer($id)
	{
		
        $data = User::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.'"'.$data->name.'"'.' thành công!!!');
        return redirect('admin/customer');
	}
}
