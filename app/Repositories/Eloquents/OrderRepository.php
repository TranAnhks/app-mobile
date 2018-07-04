<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Eloquents\BaseRepository;
use Illuminate\Support\Str;
use App\Mail\OrderShipped;
use App\Models\Oder;
use Session;
use Mail;
use Auth;
use Cart;

class OrderRepository extends BaseRepository implements OrderInterface
{
    //
	public function model()			
	{
		return Oder::class;
	}

    public function pageoder()
    {
    	if (Auth::guest()) {
            return redirect('login');
        } else {
            return view ('frontend.order.order');
        }   
    }

    public function pagepostoder($request)
    {
    	$total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
     
        if (Cart::count()==null) {
            Session::flash('ketqua','Đơn hàng trống !');
        }
        else {
            $user = Auth::user();
            $oder = $user->oders()->create([
                'total' => floatval($total),
                'status' => 0,
                'verifyToken' => Str::random(40), 

            ]);
            foreach (Cart::content() as $row) {
                $oder->products()->attach($row->id, [
                    'quantity' => $row->qty,
                    'total' => ($row->qty * $row->price),
               
                ]);
            }

            $thisUser = Oder::findOrFail($oder->id);
            $this->pagesendEmail($thisUser);

            Cart::destroy();   
            
            if ('app.locale'=='vi') {
                Session::flash('ketqua','Đơn hàng của bạn đã được gửi đi !');
            }
            else {
                Session::flash('ketqua','Your invoice has been sent');
            }
        }
        return redirect('cart');
    }
    
    public function pagesendEmail($thisUser)
    {
    	$userEmail = Auth::User()->email;
        Mail::to($userEmail)->send(new OrderShipped($thisUser));
    }

    public function pageverifyEmailFirst()
    {
    	return view('email.verifyEmailFirst');
    }
 
    public function pagesendEmailDoneOder($verifyToken)
    {
    	$user = Oder::where(['verifyToken'=>$verifyToken])->first();
        if ($user) {
            return Oder::where(['verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>NULL]);
        } else {
            return 'oder không xác định';
        }
    }

    // Admin
    public function pageoderad()
    {
        $oder = Oder::paginate(10);
        return view('admin.order.index',compact('oder'));
    }

    public function pageorderdetailad($id)
    {
        $oder = Oder::where('id',$id)->first();
      
        return view('admin.order.detail',compact('oder'));
    }

    public function pagecreatead()
    {
        return view('admin.order.add');
    }

    public function pageeditad($id)
    {
        $oder = Oder::where('id',$id)->first();
          
        return view('admin.order.detail',compact('oder'));

    }

    public function pageupdatead($id)
    {
        $oder = Oder::find($id);
        $oder->status = 1;
        $oder->save();

        Session::flash('ketqua', 'Xác nhận đơn hàng thành công!!!');
        return redirect('admin/order');
    }

    public function pagedestroyad($id)
    {
        $data = Oder::findOrFail($id);
        $data->delete();

        Session::flash('ketqua', 'Xóa dữ liệu '.$data->name.' thành công!!!');
        return redirect('admin/order');
    }
}
