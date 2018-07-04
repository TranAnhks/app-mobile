@extends('layouts.cate-layout')
@section('content')

<div class="col-xs-12 col-sm-8">              
    <div class="panel panel-success">
        <div class="panel-body">

            <div class="container-fluid mt-5">
                <div class="form-group row">
                    @if (session('ketqua'))
                        <div class="col-sm-12">
                            <div class="alert alert-success" role="alert">
                                {{ session('ketqua') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xs-12">
                <table class="table table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('user/cart.hinhanh')}}</th>
                            <th>{{trans('user/cart.tensanpham')}}</th>
                            <th id="soluong">{{trans('user/cart.soluong')}}</th>
                            <th>{{trans('user/cart.chucnang')}}</th>
                            <th>{{trans('user/cart.gia')}}</th>
                            <th>{{trans('user/cart.thanhtien')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $row)
                        <tr> 
                            <td>{!!$row->id!!}</td>
                            <td><img src="{!!url('./uploads/products/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
                            <td width="180">{!!$row->name!!}</td>
                            <td class="text-center">                        
                                <a href="{!!url('cart/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
                                <input type="text" class="qty text-center" value=" {!!$row->qty!!}" readonly="readonly"> 
                                <a href="{!!url('cart/update/'.$row->rowId.'/'.$row->qty.'-up')!!}" ><span class="glyphicon glyphicon-plus-sign"></span></a>
                            </td>
                            <td>
                              <a href="{!!url('cart/delete/'.$row->rowId)!!}"><span class="delete glyphicon glyphicon-remove"></span>
                              </a>
                            </td>
                            <td>{!! number_format($row->price) !!} Vnd</td>
                            <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="3"><strong>{{trans('user/cart.tongtien')}}</strong> </td>
                            <td>{!!Cart::count()!!}</td>
                            <td class="tongtien" colspan="2">{!!Cart::subtotal()!!} Vnd</td>                   
                        </tr>   
                    </tbody>
                </table>

                @if(Cart::count() !=0)
                    @if (Auth::guest())
                        <div class="input-group">
                          <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                            <option value="cod">{{trans('user/cart.thanhtoan')}}</option>
                          </select>
                        </div>
                        <a class="btn btn-large btn-warning pull-right" href="{!!url('/login')!!}">Tiến hàng thanh toán</a>
                    @else
                        <form action="{!!url('/order')!!}" >                  
                            <div class="input-group">
                                <label for="paymethod">{{trans('user/cart.choncachthuc')}}</label>
                                <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                                  <option value="">{{trans('user/cart.choncachthuc1')}}</option> 
                                  <option value="cod">{{trans('user/cart.thanhtoan')}}</option>
                                </select>
                            </div>
                          <hr>
                          <button type="submit" class="btn btn-danger pull-right">{{trans('user/cart.xacnhanthanhtoan')}}</button>
                          <a href="{!!url('/mobile')!!}" type="button" class="btn btn-large btn-primary pull-left">{{trans('user/cart.tieptucmua')}}</a>
                        </form>
                    @endif
                @endif
            </div>
            
        </div>
    </div>
</div>
 
@endsection
  