@extends('layouts.cate-layout')
@section('content')
	<div id="content">
		@include('frontend.product.ajax')
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/ajax.js') }}"></script>
@endsection

