@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')

	{!! Form::model($category_edit, array('route' => array('category.update', $category_edit->id), 'method' => 'put')) !!}

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

	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/category')!!}">Doanh mục</a></li>
		<li class="active">Sửa doanh mục</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Sửa doanh mục</small></h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body">
			    	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			      		{!! Form::label('input-id', 'Tên danh mục', ['class'=>'control-label']) !!}
			      		{!! Form::text('name', $category_edit->name, ['class' => 'form-control']) !!}
	      		  		<span class="text-danger">{{ $errors->first('name') }}</span>

	      		  	</div>
		      		{!! Form::submit('Sửa danh mục', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}
	
@endsection