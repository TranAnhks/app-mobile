@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
{!! Form::model($product_edit, array('route' => array('product.update', $product_edit->id), 'method' => 'put','files'=>true,'enctype'=>'multipart/form-data')) !!}
	<br>
	
	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/product')!!}">Sản phẩm</a></li>
		<li class="active">Cập nhật sản phẩm</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Cập nhật sản phẩm: </small></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body" id="panel_pro">

		      		<div class="form-group">
			      		{!! Form::label('input-id', 'Chọn thư mục', ['class'=>'control-label']) !!}
	                    {{-- {!! Form::text('t', $product_edit->cat_id, []) !!} --}}
						{!! Form::select('category', $category_edit, $product_edit->category_id, ['class'=>'form-control category']) !!}
		      		</div>

		      		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Tên sản phẩm', ['class'=>'control-label']) !!}
		      	
		      			{!! Form::text('name', $product_edit->name, ['class'=>'form-control']) !!}
		      			<span class="text-danger">{{ $errors->first('name') }}</span>

		      		</div>

		      		<div class="form-group {{ $errors->has('packet') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Gồm có', ['class'=>'control-label']) !!}
		      			{!! Form::text('packet', $product_edit->packet, ['class'=>'form-control']) !!}
		      			<span class="text-danger">{{ $errors->first('packet') }}</span>
		      		</div>
		      		
		      		<div class="form-group {{ $errors->has('promo') ? 'has-error' : '' }}">
		      			{!! Form::label('input-id', 'Khuyến mãi', ['class'=>'control-label']) !!}
		      			{!! Form::text('promo', $product_edit->promo, ['class'=>'form-control']) !!}
		      			<span class="text-danger">{{ $errors->first('promo') }}</span>
		      		</div>

		      		<div class="form-group">				      			
		      			<div class="row">
			      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			      				{!! Form::label('input-id', 'Hình ảnh', ['class'=>'control-label']) !!}
			      				{!! Form::file('txtimg', ['class'=>'form-control']) !!}
			      			 	{!! Form::label('', 'Ảnh cũ', ['class'=>'control-label']) !!}
			      				<img src="{!!url('uploads/products/'.$product_edit->images)!!}" alt="{!!$product_edit->images!!}" width="80" height="60">
			      			</div>

			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 {{ $errors->has('price') ? 'has-error' : '' }}">
		      					{!! Form::label('input-id', 'Giá bán', ['class'=>'control-label']) !!}
		      					{!! Form::text('price', $product_edit->price, ['class'=>'form-control']) !!}
		      					<span class="text-danger">{{ $errors->first('price') }}</span>
			      			</div>
			      		</div>				      			
		      		</div>

			      	<div class="form-group">
		      			{!! Form::label('', 'Chi tiết cấu hình sản phẩm', ['class'=>'control-label']) !!}
		      			<div class="row">
		      				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			      				{!! Form::label('', 'Màn hình', ['class'=>'control-label']) !!}
			      				{!! Form::text('screen',$product_detail_edit->screen, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'Hệ điều hành', ['class'=>'control-label']) !!}
			      				{!! Form::text('os',$product_detail_edit->os, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			      				{!! Form::label('', 'Cammera trước', ['class'=>'control-label']) !!}
			      				{!! Form::text('cam2',$product_detail_edit->cam1, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			      				{!! Form::label('', 'Cammera sau', ['class'=>'control-label']) !!}
			      				{!! Form::text('cam1',$product_detail_edit->cam2, ['class'=>'form-control']) !!}
			      			</div>
				      	</div>

			      		<div class="row">
			      			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			      				{!! Form::label('', 'Cpu', ['class'=>'control-label']) !!}
			      				{!! Form::text('cpu',$product_detail_edit->cpu, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'Ram', ['class'=>'control-label']) !!}
			      				{!! Form::text('ram',$product_detail_edit->ram, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
								{!! Form::label('', 'Bộ nhớ trong', ['class'=>'control-label']) !!}
			      				{!! Form::text('storage',$product_detail_edit->storage, ['class'=>'form-control']) !!}
			      			</div>
			      		</div>

			      		<div class="row">
			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">	
			      				{!! Form::label('', 'Thẻ nhớ', ['class'=>'control-label']) !!}
			      				{!! Form::text('extend',$product_detail_edit->exten_memmory, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			      				{!! Form::label('', 'SIM hỗ trợ', ['class'=>'control-label']) !!}
			      				{!! Form::text('sim',$product_detail_edit->sim, ['class'=>'form-control']) !!}
			      			</div>

			      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			      				{!! Form::label('', 'PIN', ['class'=>'control-label']) !!}
			      				{!! Form::text('pin',$product_detail_edit->pin, ['class'=>'form-control']) !!}
			      			</div>
			      		</div>				      			
		      		</div>

					{!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>

{!! Form::close() !!}	
@endsection