@include('includes.header')
@include('includes.logo')
@include('includes.menu')
	@include('includes.slide')
	<br>
    <div class="container">     
      	<div class="row">
			@yield('content')
      	</div>       <!-- /row -->
    </div> <!-- /container -->
@include('includes.footer')
 