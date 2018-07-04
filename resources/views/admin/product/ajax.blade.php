
	<br>

	<ol class="breadcrumb">
			<li>
				<a href="#" class="fa fa-home"></a>
			</li>
			<li class="active">Sản phẩm</li>
	</ol>
	
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

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="chonsanpham" for="inputLoai" class="col-md-12 control-label"><strong> Chọn sản phẩm </strong></label>
								</div>
						 	 
						 		<div class="col-md-6">
									<div class="input-group" id="adv-search">
										<input type="text" class="form-control" id="search" value="{{ request()->session()->get('search') }}" onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/product')}}?search='+this.value)"
											placeholder="Search.." name="search"
											type="text" id="search"/>
										<div class="input-group-btn">
											<div class="btn-group" role="group">
												<div class="dropdown dropdown-lg">
													<button type="submit" class="btn btn-primary"
														onclick="ajaxLoad('{{url('admin/product')}}?search='+$('#search').val())">
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
									</div> 
								</div>

								<div class="col-md-2">
									<a href="{!!URL::to('admin/product/create')!!}" class="btn btn-primary">Thêm mới sản phẩm</a>
									</a>
								</div>
							</div>

						</div>
					</div>
				</div> 
			 
			 
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>										
									<th>ID</th>										
									<th>Hình ảnh</th>
									<th>Tên sản phẩm</th>
									<th>Thương hiệu</th>
									<th>Giá bán</th>
									<th>Trạng thái</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php  $stt=0;?>
							 	@foreach ($product as $pro)
							 	<?php $stt++;?>
								<tr>
									<td>{!!$stt!!}</td>
									{{-- <td>{!!$pro->id!!}</td> --}}
									<td> <img src="{!!url('uploads/products/'.$pro->images)!!}" alt="{!!$pro['images']!!}" width="50" height="40"></td>
									<td>{!!$pro->name!!}</td>
									<td>{!!$pro->category['name']!!}</td>
									{{-- <td>{!!$pro->category->name!!}</td> --}}
									<td>{!!number_format($pro->price)!!} đ</td>
									<td>
										@if($pro->status ==1)
											<span class="status2">Còn hàng</span>
										@else
											<span class="status1"> Tạm hết hàng </span>
										@endif
									</td>
									<td>
				                    	{!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $pro->id] ]) !!}
				                    			<a href="{{ route('product.edit', $pro->id) }}" class="btn btn-primary btn-sm">Edit</a>
				                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
				                    	{!! Form::close() !!}
				                    </td>
								</tr>	
								@endforeach			
							</tbody>
						</table>
					</div>
				</div>
			
				<div class="col-md-12">
					{!!$product->links();!!}
				</div>
			</div>
		</div>
	</div>
