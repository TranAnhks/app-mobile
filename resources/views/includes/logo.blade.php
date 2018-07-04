	<div class="container">
		<div class="col-md-7">
			{{-- <a href="#" style="font-size: 40px; text-decoration: none "><b>Anh</b>Mobile</a> --}}
			<a href="{!!url('/')!!}">
				<img src="http://v1.webbnc.net/vuthiloan/uploads/web/qc_header_0.92658700_1409726259.jpg" width="300px" height="70px">
			</a>
		</div>
	{{-- 	<div class="col-md-5 hotline"><p>{{ trans('messages.duongdaynong')}}:1900999999 - {{ trans('messages.diachi')}}: 100 Hoàng diệu - Đà Nẵng</p></div> --}}
		<ul class="nav navbar-nav pull-right ngonngu">  
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ trans('user/menu.thaydoingonngu') }}<span class="caret"></span>
                </a>
            
                <div class="dropdown-menu" id="dangnhap" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}">
                       <p>{{ trans('user/menu.en') }}</p>
                    </a>
                    <a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}">
                       <p>{{ trans('user/menu.vi') }}</p>
                    </a>
                </div>
            </li>
        </ul>
	</div>
 