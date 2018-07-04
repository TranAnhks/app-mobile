@extends('layouts.master')
 
@section('content')
    <div id="content">
        @include('frontend.index.ajax')
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection

