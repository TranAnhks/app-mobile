@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
<br>
{!! Form::model($user_edit, array('route' => array('user.update', $user_edit->id), 'method' => 'put')) !!}
	
	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/user')!!}">Khách hàng</a></li>
		<li class="active">Cập nhật khách hàng</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Cập nhật khách hàng</small></h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body">

		      	  	<div class="form-group">
				      	{!! Form::label('', 'Tên khách hàng', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtname', $user_edit->name, ['class'=>'form-control']) !!}
		      	  	</div>

			      	<div class="form-group">
			      		{!! Form::label('input-id', 'Email ', ['class'=>'control-label']) !!}
			      		{!! Form::text('txtemail',$user_edit->email, ['class' => 'form-control', 'required'=>'required']) !!}
	      		  	</div>
	      	
		      	  	<div class="form-group">
				      	{!! Form::label('', 'Phone', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtphone', $user_edit->phone, ['class'=>'form-control']) !!}
		      	  	</div>

		      	  	<div class="form-group">
				      	{!! Form::label('', 'Address', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtaddress', $user_edit->address, ['class'=>'form-control']) !!}
		      	  	</div>

		      		{!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}

				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}

@endsection