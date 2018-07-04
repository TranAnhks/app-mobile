@extends('admin.layouts.admin')
@section('title','Contact page')
 
@section('noidung') 
    <div id="content">
        @include('admin.category.ajax')
    </div>
@endsection

@section('js')
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection

