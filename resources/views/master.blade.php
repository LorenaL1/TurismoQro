<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') - {{ Config::get('circuito.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">
	<meta name="auth" content="{{ Auth::check() }}">

	@yield('custom_meta') 

	<!-- CSS only -->


	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://kit.fontawesome.com/1dcd712cbe.js" crossorigin="anonymous"></script>
	
	<!--<link rel="preconnect" href="https://fonts.gstatic.com">-->
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<!--<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>-->
	

	

	<!--<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>-->


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script src="{{ url('/static/js/mdslider.js?v='.time()) }}"></script>
	<script src="{{ url('/static/js/site.js?v='.time()) }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	



</head> 
<body>

	

	<nav class="navbar navbar-expand-lg shadow">
		<div class="container">
    	<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/static/images/tur.png') }}"></a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationMain" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      		<i class="fas fa-bars"></i>
    	</button>

    	<div class="collapse navbar-collapse" id="navigationMain">
    		<ul class="navbar-nav ml-auto">
    			<li class="nav-item">
    				<a href="{{ url('/') }}" class ="nav-link lk-home"><i class="fas fa-home"></i> <span>Inicio</span></a>
    			</li>

    			<li class ="nav-item">
						<a href="{{ url('/attractiveh') }}" class ="nav-link lk-store lk-store_category lk-product_single"><i class="fas fa-cloud-sun-rain"></i> <span>Atractivos</span></a>
				</li>
				<li class ="nav-item">
						<a href="{{ url('/hospedajeh') }}" class ="nav-link"><i class="fas fa-hotel"></i>  <span>Hospedajes</span></a>
				</li>
				
				

    			@if(Auth::guest())
    			<li class="nav-item link-acc">
    				<a href="{{ url('/login') }}" class ="nav-link btn"><i class ="far fa-user-circle"></i> Ingresar</a>
    				<a href="{{ url('/register') }}" class ="nav-link btn"><i class ="far fa-user-circle"></i> Crear cuenta</a>
    			</li>
    			
    			@else

    			<li class="nav-item link-acc link-user dropdown">
    				<a href="{{ url('/login') }}" class ="nav-link btn dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    					@if(is_null(Auth::user()->avatar))
    						<img src="{{ url('/static/images/avatar1.png') }}">
    					@else
							<img src="{{ url('/uploads_users/'.Auth::id().'/av_'.Auth::user()->avatar) }}" class="circle"> 
    					@endif Hola: {{ Auth::user()->name }}
    				</a>
    				<ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
    					@if(Auth::user()->role == "1")
    					<li><a class="dropdown-item" href="{{ url('/admin') }}"><i class="fas fa-chalkboard-teacher"></i>  Administración</a></li>

    					<li><hr class="dropdown-divider"></li>

    					@endif

    					

    					<li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i>  Salir</a></li>
    				</ul>
    			</li>
    			@endif
    		</ul>
    	</div>
		</div>
	</nav>





				@if(Session::has('message'))
			       <div class="container">
			           <div class="alert alert-{{ Session::get('typealert') }} mtop16 " style="display:block; margin-bottom: 16px;">
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
			    <div class="wrapper">
			    	<div class="container">
			    		@yield('content')
			    	</div>
			    </div>

    

</body>
</html>