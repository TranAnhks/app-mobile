@include('includes.header')
@include('includes.logo')
@include('includes.menu')
    <div class="container">     
      	<div class="row">   
			@yield('content')
      	</div>
    </div>
@include('includes.footer')