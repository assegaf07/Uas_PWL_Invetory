<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sinventory Gamat</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body>
    <div class="container" style="text-align: center; margin-top:10px;">
        <h1>Sistem Informasi Inventory </h1>
    </div>

  <div class="container-fluid">
	@include('layout.header')
	<div class="row">
        <div class="col-md-9">
            @yield('content')
		</div>
		@include('layout.sidebar')
    
		
	</div>
  @include('layout.footer')
	
  </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
</body>
</html>