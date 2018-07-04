<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Title - @yield('title')</title><!--Khai bao tieu de cho tung trang rieng-->
    @include('admin.includes.include')
</head>
<body>
    <div id="wrapper">
         <nav class="navbar navbar-default navbar-static-top" role="navigation" >
            @include('admin.includes.header')
            @include('admin.includes.menu')
         </nav>
         <div id="page-wrapper">
            @yield('noidung')
        </div>
    </div>
</body>
</html>
 
  
  

