@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
	<br>
	<ol class="breadcrumb">
			<li>
				<a href="#" class="fa fa-home"></a>
			</li>
			<li class="active">Đơn đặt hàng</li>
	</ol>

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

	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($oder, array('route' => array('order.update', $oder->id), 'method' => 'put')) !!}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">				
				<div class="panel panel-default">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th> Họ-tên khách hàng</th>
									<th>Địa chỉ</th>
									<th>Điện thoại</th>
									<th>Ngày đặt</th>
									<th>Tổng tiền</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{!!$oder->id!!}</td>
									<td>{!!$oder->user->name!!}</td>
									<td>{!!$oder->user->address!!}</td>
									<td>{!!$oder->user->phone!!}</td>
									<td>{!!$oder->created_at!!}</td>
									<td>{!! number_format($oder->total) !!} Vnđ</td>
									 
								</tr>
							</tbody>
						</table>
					</div>

					<div class="panel-heading">						 
						<h4>Chi tiết sản phẩm trong đơn đặt hàng</h4>
					</div>

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th> Số lượng </th>
										<th>Giá bán</th>
										<th>Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									{{-- @foreach($data as $row)
										 <tr>
											 <td>{!!$row->id!!}</td>
											 <td> <img src="{!!url('uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40"></td>
											 <td>{!!$row->name!!}</td>
											 <td>{!!$row->qty!!}</td>
											 <td>{!!$row->price!!}</td>
											 <td>
											 	@if($row->status ==1)
													<span class="status2">Còn hàng</span>
												@else
													<span class="status1"> Tạm hết</span>
												@endif
											 </td>
										</tr>
									@endforeach		 --}}
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
			{!! Form::close() !!}
		</div>
	</div>		
 
@endsection