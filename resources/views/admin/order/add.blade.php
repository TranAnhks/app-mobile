@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/order')!!}">Đơn đặt hàng</a></li>
		<li class="active">Thêm đơn hàng</li>
	</ol>
	
	<h4>Order - Create</h4>
@endsection