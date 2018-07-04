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
		<li class="active">Khách hàng</li>
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
			<div class="panel panel-default">

				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<div class="form-group">
								<div class="col-md-11">
									<label for="inputLoai" class="col-sm-4 control-label"><strong> Danh sách khách hàng</strong></label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>										
									<th>ID</th>										
									<th>Tên khách hàng</th>
									<th>Địa chỉ</th>
									<th>Điện thoại</th>
									<th>Email</th>										
									<th>Ngày đăng ký</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $us)
									<tr>
										<td>{{$us['id']}}</td>
										<td>{{$us['name']}}</td>
										<td>{{$us['address']}}</td>
										<td>{{$us['phone']}}</td>
										<td>{{$us['email']}}</td>
										<td>{{$us['created_at']}}</td>
										<td>
											{!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $us->id] ]) !!}
					                    		<a href="{{ route('customer.edit', $us->id) }}" class="btn btn-primary btn-sm">Edit</a>
					                    		{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
					                    	{!! Form::close() !!}
										</td>
									</tr>	
								@endforeach				
							</tbody>
						</table>
					</div>
				</div>

			</div>			
		</div>
	</div>
@endsection