<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') - CircuitoTuristico</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/1dcd712cbe.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>

<script>
	$(document).ready(function(){
		$('[data-bs-toggle="tooltip"]').tooltip()

	});


</script>

</head>
<body>

	<div class="wrapper">
		<div class="col1">@include('admin.sidebar')</div>
		<div class="col2">
		<nav class="navbar navbar-expand-lg shadow">
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link">
							CIRCUITO TURISTICO QUERETARO
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="page">

			<div class="container-fluid">
				<nav aria-label="breadcrumb shadow">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ url('/admin') }}"><i class="fa fa-home" aria-hidden="true"></i>  Escritorio
							</a>
						</li>
						@section('breadcrumb')
						@show 
					</ol>
					
				</nav>
			</div>

			@if(Session::has('message'))
       <div class="container">
           <div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display:none;">
               {{ Session::get('message') }}
               @if ($errors->any())
               <ul>
                   @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
               </ul>
               @endif
               <script>
                   $('.alert').slideDown();
                   setTimeout(function(){ $('.alert').slideUp(); }, 10000);
               </script>
           </div>
       </div>
    @endif

    @section('content')
    @show


		</div>


	    </div>
    </div>

</body>
</html>