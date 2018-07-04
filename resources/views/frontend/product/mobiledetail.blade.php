@extends('layouts.cate-layout')
@section('content')
     
<div class="col-xs-12 col-sm-8  ">              
    <div class="panel panel-success">
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                    <h4>
                        <a href="" class="pro-detail-title"> 
                          {!! Form::label('',trans('user/mobile.tieudesanpham'), ['control-label']) !!}
                          {!! Form::label('', $mobile->name, ['control-label']) !!}
                        </a>
                    </h4>
                    <hr>

                    <div class="row">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <div class="img-box img_detail">
                            <img class="img-responsive" src="{!!url('./uploads/products/'.$mobile->images)!!}" alt="img responsive">
                            </div>
                            <h3 class="price  ">{!!number_format($mobile->price)!!}₫</h3>
                        </div>
       
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{trans('user/mobile.chinhsach')}}</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="khuyenmai">
                                        <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$mobile->promo!!}</li>
                                        <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt phần miềm, tải nhạc - ứng dụng miến phí</li>                                    
                                    </div>                         
                                </div>
                            </div>

                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="chinhsach">
                                        <li><span class="glyphicon glyphicon-hand-right"></span> Trong hộp có: {!!$mobile->packet!!} </li>
                                        <li><span class="glyphicon glyphicon-hand-right"></span> Bảo hành chính hãng: thân máy 12 tháng, pin 12 tháng, sạc 12 tháng</li>
                                        <li><span class="glyphicon glyphicon-hand-right"></span> Giao hàng tận nơi miễn phí trong 1 ngày</li>
                                        <li><span class="glyphicon glyphicon-hand-right"></span> 1 đổi 1 trong 1 tháng với sản phẩm lỗi</li>
                                    </div>
                                </div>
                            </div>
                            <a href="{!!url('cart/addcart/'.$mobile->id)!!}" title="" class="btn btn-large btn-block btn-primary btnthemct">{{trans('user/mobile.dathang')}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th colspan="2">{{trans('user/mobile.thongso')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>{{trans('user/mobile.manhinh')}}</td>
                                  <td>{!!$mobile_detail->screen!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.hedieuhanh')}}</td>
                                  <td>{!!$mobile_detail->os!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.camtruoc')}}</td>
                                  <td>{!!$mobile_detail->cam1!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.camsau')}}</td>
                                  <td>{!!$mobile_detail->cam2!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.hedieuhanh')}}</td>
                                  <td>{!!$mobile_detail->cpu!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.ram')}}</td>
                                  <td>{!!$mobile_detail->ram!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.bonhotrong')}}</td>
                                  <td>{!!$mobile_detail->storage!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.thenho')}}</td>
                                  <td>{!!$mobile_detail->exten_memmory!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.sim')}}</td>
                                  <td>{!!$mobile_detail->sim!!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('user/mobile.pin')}}</td>
                                  <td>{!!$mobile_detail->pin!!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div> 

{{-- Danh sách cửa hàng --}}
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">            
    <!-- panel inffo 1 -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title text-center">{{trans('user/mobile.danhsachcuahang')}}</h3>
        </div>

        <div class="panel-body no-padding">
            <p>
              <i class="glyphicon glyphicon-hand-right"></i> Hotline 1900.6122 <br>
              <i class="glyphicon glyphicon-hand-right"></i> 100 Hoàng Diệu, Đà Nẵng 1900.999.999 
            </p>
        </div>
    </div>
</div> 

{{-- chế độ bảo hành --}}
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">            
    <!-- panel inffo 1 -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title text-center">{{trans('user/mobile.chedobaohanh')}}</h3>
        </div>

        <div class="panel-body no-padding">
            <p><i class="glyphicon glyphicon-hand-right"></i> Bảo hành chính hãng 12 tháng. <br>
                <i class="glyphicon glyphicon-hand-right"></i> 1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.
            </p>
        </div>

    </div>
</div>

 
 
@endsection