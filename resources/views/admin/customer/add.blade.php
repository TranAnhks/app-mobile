@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
 <br>
{!! Form::open(array('url' => 'admin/customer', 'method' => 'post')) !!}
 
	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/customer')!!}">Khách hàng</a></li>
		<li class="active">Thêm khách hàng</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Thêm mới khách hàng</small></h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body">

		      		<div class="form-group">
				      	{!! Form::label('', 'Tên khách hàng', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtname', '', ['class'=>'form-control']) !!}
		      		</div>

			      	<div class="form-group">
			      		{!! Form::label('input-id', 'Email ', ['class'=>'control-label']) !!}
			      		{!! Form::text('txtemail','', ['class' => 'form-control', 'required'=>'required']) !!}
	      		  	</div>

	      		  	<div class="form-group">
				      	{!! Form::label('', 'Pass', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtpass', '', ['class'=>'form-control']) !!}
		      	  	</div>

		      	  	<div class="form-group">
				      	{!! Form::label('', 'Phone', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtphone', '', ['class'=>'form-control']) !!}
		      	  	</div>

		      	  	<div class="form-group">
				      	{!! Form::label('', 'Address', ['class' => 'col-form-label']) !!}
						{!! Form::text('txtaddress', '', ['class'=>'form-control']) !!}
			      	</div>

		      		{!! Form::submit('Thêm khách hàng', ['class' => 'btn btn-primary']) !!}

				</div>
			</div>
		</div>
	</div>
@endsection