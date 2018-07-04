<?php

namespace App\Repositories\Eloquents;

use App\User;
use App\Models\Category;
use App\Models\Oder;
use Auth;
use Session;
use App\Repositories\Contracts\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{
    public function model()         
    {
        return User::class;
    }

    public function pageindex()
    {
    	$user = User::where('id','=',Auth::user()->id)->get();
	    $category = Category::all();
	    $oder = Oder::where('user_id','=',Auth::user()->id)->get();
        
        return view('frontend.user.index',compact('user','category','oder'));
    }

    public function pageedit($id)
    {
        $category = Category::all();
        $user_edit = User::where('id',$id)->first();

        return view('frontend.user.edit',compact('category','user_edit'));
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
        //dd($data);
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhật dữ liệu thành công');
        return redirect('user');
    }

}