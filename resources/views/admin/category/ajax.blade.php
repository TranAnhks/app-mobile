<br>
<div class="col-ms-12">	

	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class="active">Doanh mục</li>
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
						<div class="col-md-10">
							<div class="form-group">
							<div class="col-md-11">
								<label for="inputLoai" class="col-sm-4 control-label"><strong> Danh sách loại sản phẩm</strong></label>
							</div>
							<div class="col-md-1">
								<a href="{!!URL::to('admin/category/create')!!}" class="btn btn-primary">Thêm mới doanh mục</a>
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
									<th>Tên danh mục</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($category as $cate)
									<tr>
										<td>{{ $cate['id'] }}</td>
										<td>{{ $cate['name'] }}</td>
										<td>
					                    	{!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $cate->id] ]) !!}
					                    			<a href="{{ route('category.edit', $cate->id) }}" class="btn btn-primary">Edit</a>
					                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					                    	{!! Form::close() !!}
					                    </td>
									</tr>	
								@endforeach		
							</tbody>
						</table>
						{{ $category->links()}}
					</div>
				</div>

			</div>			
		</div>
	</div>
</div>