<nav class="navbar navbar-default" role="navigation" >

	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
            
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{!!URL::to('/')!!}">{{ trans('user/menu.trangchu') }}</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				{{-- <li><a href="{!!URL::to('mobile')!!}">Điện thoại</a></li> --}}
				
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('user/menu.dienthoai') }}<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    {{-- @foreach($category as $cate)
                      <li><a href="{!!URL::to('mobile',$cate->id)!!}">{!!$cate->name!!}</a></li>
                    @endforeach --}}
                      @foreach($loai_sp as $l)
                        <li>
                          <a href="{!!URL::to('mobile/loai',$l->id)!!}">{{$l->name}}</a>
                        </li>
                      @endforeach
                  </ul>
                </li>

                <li><a href="{!!URL::to('intro')!!}">{{ trans('user/menu.gioithieu') }}</a></li>
			</ul>
		 
          
		    <ul class="nav navbar-nav pull-right">  
 
              {{-- <li><a href="{{ url('/admin/home') }}">Vào trang quản trị</a></li> --}}
              <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-shopping-cart"><span class="badge">{!!Cart::count();!!}</span></span> {{ trans('user/menu.giohang') }} <b class="caret"></b></a>
                <ul class="dropdown-menu" id="giohang">
                @if(Cart::count() !=0)
                  <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr class="tr_giohang">
                        <th>{{ trans('user/menu.anh') }}</th>
                        <th>{{ trans('user/menu.soluong') }}</th>
                        <th>{{ trans('user/menu.ten') }} <SPAN></SPAN></th>
                        <th>{{ trans('user/menu.gia') }}</th>
                      </tr>
                    </thead>
                       <tbody>                       
                      @foreach(Cart::content() as $row)
                         <tr style="font-size: 14px">
                           <td> {!!$row->images!!} <img class="card-img img-circle" src="{!!url('uploads/products/'.$row->options->img)!!}" alt="dell" width="30px" height="30px"></td>
                           <td>{!!$row->qty!!}</td>
                           <td>{!!$row->name!!}</td>                           
                           <td>{!!number_format($row->price)!!}₫</td>
                         </tr>                         
                        @endforeach                           
                       </tbody>                       
                     </table> 
                     <a href="{!!url('/cart/')!!}" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                     <a href="{!!url('/cart/xoa')!!}" type="button" class="btn btn-danger pull-right"> Xóa </a>
                  </div>
                  @else
                    <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr>
                        <th>{{ trans('user/menu.anh') }}</th>
                        <th>{{ trans('user/menu.soluong') }}</th>
                        <th>{{ trans('user/menu.ten') }} <SPAN></SPAN></th>
                        <th>{{ trans('user/menu.gia') }}</th>
                      </tr>
                    </thead>
                       <tbody>                       
                        <td colspan="3">{{ trans('user/menu.thongtin') }}</td>                        
                       </tbody>                       
                     </table> 
                  </div>
                  @endif
                </ul>
              </li> 
              <!-- Authentication Links -->
                @if (Auth::guest())
                   {{--  <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li> --}}
                    <li>
						<a class="" data-toggle="modal" href='#myDangNhap'>{{ trans('user/menu.dangnhap') }}</a>
					</li>
                @else
                   <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
					
                        <div class="dropdown-menu" id="dangnhap" aria-labelledby="navbarDropdown">
                        	<a class="dropdown-item" href="{!!URL::to('user')!!}">
                               <p>Thông tin cá nhân</p>
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>

				<!-- Modal -->
				{!! Form::open(array('url' => 'login', 'method' => 'post')) !!}
			  	<div class="modal fade" id="myDangNhap" role="dialog">
				    <div class="modal-dialog" id="modal_dangnhap">
				    	<div class="modal-content">
					        <div class="modal-header">
					        {{-- {!! Form::submit('', ['class'=>'close','data-dismiss'=>'modal']) !!} --}}
					          
					          <h4 class="modal-title">{{ trans('user/menu.dangnhap')}}</h4>
					        </div>
					        <div class="modal-body">
					        	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					        		{!! Form::text('email', '', ['class'=>'form-control','placeholder'=>trans('user/menu.nhapemail'),'required']) !!}
    					        	<span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
					        	<div class="form-group">
					        	{!! Form::password('password', ['class'=>'form-control','placeholder'=>trans('user/menu.nhapmatkhau'),'required']) !!}
					        		
					        	</div>
					        	<div class="form-group">
						            {!! Form::checkbox('remember') !!}
									{!! Form::label('', trans('user/menu.ghinho'), ['class'=>'control-label']) !!}
						        </div>  
					        </div>  

					        <div class="modal-footer" id="modal_footer_dn">
                                <button type="submit" class="btn btn-primary col-sm-6">
                                    {{trans('user/menu.dangnhapvao')}}
                                </button>
                                <button type="" class="btn btn-default col-sm-5" data-dismiss="modal">
                                        {{ trans('user/menu.huybo') }}
                                </button>
                                {{-- <a href="{{ route('auth.facebook') }}">Facebook Login</a> --}}
                                 
                            </div>
					    
							<div class="login-help">
								<div class="col-md-offset-5">
						         {{--  <a class="btn btn-link" href="{!!url('/register')!!}"> <strong class="dangky"> {{ trans('user/menu.dangky') }}</strong> </a>  --}}
                                     <a class="btn btn-link " data-toggle="modal" data-dismiss="modal" href='#modal-1'><strong class="dangky">{{ trans('user/menu.dangky') }}</strong></a>
						        </div>
                            </div>
                            
                            <div class="login-society">
                                <div class="col-md-offset-3">
                                    <div class="btn-group">
                                        <a href="{{ route('auth.facebook') }}" class="btn btn-primary"><i class="fa fa-facebook" id="icon-facebook" ></i></a>
                                        <a class="btn btn-primary" href="{{ route('auth.facebook') }}" > Sign in with Facebook</a>
                                    </div>
                                </div>
                            </div>  
                            <br>

				      	</div>
				    </div>
			  	</div>
			  	{!! Form::close() !!}

                <!-- Modal Register -->
               
                    <form method="POST" action="{{ route('register') }}">
                     @csrf
                    <div class="modal fade" id="modal-1">
                        <div class="modal-dialog" id="modal_dangnhap">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">{{ trans('user/menu.dangky') }}</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="{{trans('user/menu.nhapten') }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{trans('user/menu.nhapemail') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{trans('user/menu.nhapmatkhau') }}" required>
                                    </div>
                                    <div class="form-group">
                                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{trans('user/menu.xacnhanmatkhau') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="{{trans('user/menu.dienthoai') }}" required>
                                    </div>
                                    <div class="form-group">
                                         <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="{{trans('user/menu.diachi') }}" required autofocus>
                                    </div>
                                     <div class="form-group">
                                         
                                     </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">  {{trans('user/menu.huybo')}}</button>
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('user/menu.dangky')}}
                                    </button>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

		</div>

	</div><!-- /.navbar-collapse -->


</nav>

