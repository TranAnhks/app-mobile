@extends('layouts.cate-layout')
@section('content')
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
<div class="container">

	<hr>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr><h1>Lịch sử mua hàng </h1></tr>
						<tr>
							<th> ID</th>										
							<th> Mã đơn hàng</th>										
							<th> Ngày đặt hàng</th>										
							<th> Tổng tiền</th>										
						</tr>
					</thead>
					<tbody>
					
						<?php  $stt=0;?>
						@foreach($oder as $od)
							<?php $stt++;?>
							<tr>
								<td>{!!$stt!!}</td>
								<td>{!!$od->id!!}</td>
								<td>{!!$od->created_at!!}</td>
								<td>{!!number_format($od->total)!!} Vnđ</td>
							</tr>
						@endforeach		
					</tbody>
				</table>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="table-responsive">
					<table class="table table-bordered table-hover text-center">
						<thead>
							<tr>
								<th colspan="2"> Thông tin khách hàng : </th>	
							</tr>
						</thead>
						<tbody>
						@foreach($user as $us)
							<tr>
								<td>Họ tên</td>
								<td>{{$us['name']}}</td>
							</tr>
							<tr>
								<td>Địa chỉ E-mail</td>
								<td>{{$us['email']}}</td>
							</tr>
							<tr>
								<td>Điện thoại</td>
								<td>{{$us['phone']}}</td>
							</tr>
							<tr>
								<td>Địa chỉ Khách hàng</td>
								<td>{{$us['address']}}</td>
							</tr>
							<tr>
								<td>Ngày đăng ký</td>
								<td>{{$us['created_at']}}</td>
							</tr>
							<a href="{{ route('user.edit', $us->id) }}" class="btn btn-default btn-sm pull-right">Cập nhật thông tin</a>
						 



						@endforeach	
						</tbody>
					</table>
					<div class="pull-right">
							
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
 
@endsection