@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
{!! Form::open(array('url' => 'admin/product', 'method' => 'post','files'=>true,'enctype'=>'multipart/form-data')) !!}
{{ csrf_field() }}
	<br>

	<ol class="breadcrumb">
			<li>
				<a href="#" class="fa fa-home"></a>
			</li>
			<li class=""><a href="{!!URL::to('admin/product')!!}">Sản phẩm</a></li>
			<li class="active">Thêm sản phẩm</li>
	</ol>

	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm mới sản phẩm: </small></h1>
			</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body" id="panel_pro">

		      		<div class="form-group">
			      		{!! Form::label('input-id', 'Chọn thư mục', ['class'=>'control-label']) !!}
			      		{!! Form::select('category',$category,'',['class'=>'form-control category']) !!}
			      	 
		      		</div>

		      		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Tên sản phẩm', ['class'=>'control-label']) !!}
		      			{!! Form::text('name', '', ['class'=>'form-control','placeholder'=>'Tên sản phẩm']) !!}
		      			<span class="text-danger">{{ $errors->first('name') }}</span>


		      		</div>

		      		<div class="form-group {{ $errors->has('packet') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Gồm có', ['class'=>'control-label']) !!}
		      			{!! Form::text('packet', '', ['class'=>'form-control','placeholder'=>' Hộp, Sạc, Tai nghe']) !!}
		      			<span class="text-danger">{{ $errors->first('packet') }}</span>

		      		</div>
			      		
		      		<div class="form-group {{ $errors->has('promo') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Khuyến mãi', ['class'=>'control-label']) !!}
		      			{!! Form::text('promo', '', ['class'=>'form-control','placeholder'=>'Tặng miếng dán màn hình']) !!}
		      			<span class="text-danger">{{ $errors->first('promo') }}</span>

		      		</div>
			      	 
		      		<div class="form-group">
		      			<div class="row">
			      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  {{ $errors->has('images') ? 'has-error' : '' }}">
			      				{!! Form::label('input-id', 'Hình ảnh', ['class'=>'control-label']) !!}
			      				{!! Form::file('images', array('class' => 'form-control')) !!}
			      				
			      				<span class="text-danger">{{ $errors->first('images') }}</span>

			      			</div>
			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 {{ $errors->has('price') ? 'has-error' : '' }}">
		      					{!! Form::label('input-id', 'Giá bán', ['class'=>'control-label']) !!}
		      					{!! Form::text('price', '', ['class'=>'form-control','placeholder'=>'150000']) !!}
		      					<span class="text-danger">{{ $errors->first('price') }}</span>
			      			</div>
			      		</div>		
		      		</div>
		      		 
		      		<div class="form-group">
		      			{!! Form::label('', 'Chi tiết cấu hình sản phẩm', ['class'=>'control-label']) !!}
		      			<div class="row">
		      				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			      				{!! Form::label('', 'Màn hình', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtscreen','', ['class'=>'form-control','placeholder'=>'LED']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'Hệ điều hành', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtos','', ['class'=>'form-control','placeholder'=>'iOS11']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			      				{!! Form::label('', 'Cammera trước', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtcam2','', ['class'=>'form-control','placeholder'=>'12 MP']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			      				{!! Form::label('', 'Cammera sau', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtcam1','', ['class'=>'form-control','placeholder'=>'12 MP']) !!}
			      			</div>
			      		</div>

			      		<div class="row">
			      			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			      				{!! Form::label('', 'Cpu', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtcpu','', ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'Ram', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtram','', ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
								{!! Form::label('', 'Bộ nhớ trong', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtstorage','', ['class'=>'form-control']) !!}
			      			</div>
			      		</div>

			      		<div class="row">
			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">	
			      				{!! Form::label('', 'Thẻ nhớ', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtextend','', ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			      				{!! Form::label('', 'SIM hỗ trợ', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtsim','', ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'PIN', ['class'=>'control-label']) !!}
			      				{!! Form::text('txtpin','', ['class'=>'form-control']) !!}
			      			</div>
			      		</div>	
		      		</div>

					{!! Form::submit('Thêm sản phẩm', ['class'=>'btn btn-primary']) !!}
			      		{{-- <input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm sản phẩm" class="button" /> --}}
				</div>
			</div>
		</div>
	</div>
	
{!! Form::close() !!}	
@endsection