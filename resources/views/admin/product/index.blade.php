
	<!--/.row-->

<!--Xac dinh title cho view thong qua yield('title')-->

<!--xac dinh noi dung cho yield('noidung')-->


 
@extends('admin.layouts.admin')
@section('title','Contact page')
 
@section('noidung') 
    <div id="content">
        @include('admin.product.ajax')
    </div>
@endsection

@section('js')
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection

