@extends('layouts.cate-layout')
@section('content')
<div class="col-xs-12 col-sm-8">              
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="col-xs-12">
                <legend class="text-left">{{trans('user/cart.xacnhandonhang')}}</legend> 

                <table class="table table-hover">
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
                        {{-- nội dung order --}}
                        @foreach(Cart::content() as $row)
                          <tr>
                            {!! Form::hidden('product_id', $row->name, []) !!}
                            <td>{!!$row->id!!}</td>
                            <td><img src="{!!url('uploads   /products/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
                            <td>{!!$row->name!!}</td>
                            <td class="text-center">                        
                                <span>{!!$row->qty!!}</span>
                            </td>
                            <td>{!! number_format($row->price) !!} Vnd</td>
                            <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                          </tr>
                        @endforeach                    
                        <tr>
                            <td colspan="3"><strong>{{trans('user/cart.tongtien')}}</strong> </td>
                            <td>{!!Cart::count()!!}</td>
                            <td class="tongtien" colspan="2">
                                {!!Cart::subtotal();!!} Vnd
                            </td>                      
                        </tr>                    
                    </tbody>
                </table>   

                {{-- hình thức thanh toán khi nhận hàng --}}
                <form action=""  method="POST" role="form">
                 {{ csrf_field() }}
                    <legend class="text-left">{{trans('user/cart.xacnhankhachhang')}}</legend>
                    <div class="form-group">
                        <table class="table table-bordered table-hover ">
                            <tr>
                                <th>{{trans('user/cart.hoten')}}</th>
                                <td>{{ Auth::user()->name }} </td>
                            </tr>
                            <tr>
                                <th>{{trans('user/cart.dienthoai')}}</th>
                                <td> {{ Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{trans('user/cart.diachi')}}</th>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                        </table>
                        {{--   <label for="">
                          - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
                          - Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
                          - Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
                        </label> --}}
                    </div>               
                    <button type="submit" class="btn btn-primary pull-right">{{trans('user/cart.xacnhanthanhtoan')}}</button> 
                </form>

            </div>
        </div>     
    </div> 
</div>
<!-- ===================================================================================/news ============================== -->
@endsection