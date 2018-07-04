@extends('layouts.cate-layout')
@section('content')
	{!! Form::model($user_edit, array('route' => array('user.update', $user_edit->id), 'method' => 'put')) !!}
	 
 <div class="container">
	<div class="row">
		<div class="col-lg-11 col-md-offset-1">
			<h1 class="page-header"><small>Cập nhật khách hàng</small></h1>
		</div>
	</div>
	<!--/.row-->

 
	<div class="row">
		<div class="col-lg-11 col-md-offset-1">
			<div class="panel panel-default">					
				<div class="panel-body">
		      	  	<div class="form-group row">
				      	{!! Form::label('', 'Tên khách hàng', ['class' => 'col-form-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::text('txtname', $user_edit->name, ['class'=>'form-control']) !!}
						</div>
		      	  	</div>
			      	<div class="form-group row">
			      		{!! Form::label('input-id', 'Email ', ['class'=>'control-label col-md-2']) !!}
			      		<div class="col-md-10">
				      		{!! Form::text('txtemail',$user_edit->email, ['class' => 'form-control', 'required'=>'required']) !!}
			      		</div>
	      		  	</div>
		      	  	<div class="form-group row">
				      	{!! Form::label('', 'Phone', ['class' => 'col-form-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::text('txtphone', $user_edit->phone, ['class'=>'form-control']) !!}
						</div>
		      	  	</div>
		      	  	<div class="form-group row">
				      	{!! Form::label('', 'Address', ['class' => 'col-form-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::text('txtaddress',$user_edit->address, ['class'=>'form-control']) !!}
						</div>
		      	  	</div>
		      	  	<div class="form-group row">
			      	  	<div class="col-md-2"></div>
			      		<div class="col-md-2">
			      			{!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
			      		</div>
		      		</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>
	{!! Form::close() !!}
@endsection