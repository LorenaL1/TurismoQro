<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			<img src="{{ url('static/images/tur.png') }}" class="img-fluid">
		</div>

		<div class="user">
			<span class="subtitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->name }} {{ Auth::user()->lastname }}
				<a href="{{ url('/logout') }}" data-toggle="tooltip" data-bs-placement="top" title="Salir">
					<i class="fa fa-sign-out" aria-hidden="true"></i>
				</a>
			</div>
			<div class="email">{{ Auth::user()->email }}</div>
		</div>
	</div>
	<STYLE>A {text-decoration: none;} </STYLE>

	<div class="main">
		<ul>

			@if(kvfj(Auth::user()->permissions, 'dashboard'))
			<li>
				<a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fa fa-home" aria-hidden="true"></i>    Escritorio</a>
			</li>
			@endif


            @if(kvfj(Auth::user()->permissions, 'categories'))
			<li>
				<a href="{{ url('/admin/categories/0') }}" class="lk-categories lk-category_add lk-category_edit lk-category_delet "><i class="fa fa-folder" aria-hidden="true"></i>    Categorias</a>
			</li>
			@endif

			@if(kvfj(Auth::user()->permissions, 'attractives'))
			<li>
				<a href="{{ url('/admin/attractives/1') }}" class="lk-attractives lk-attractive_add lk-attractive_search lk-attractive_edit lk-attractive_gallery_add "><i class="fas fa-cloud-sun-rain"></i>    Atractivos</a>
			</li>
			@endif

			@if(kvfj(Auth::user()->permissions, 'hospedajes'))
			<li>
				<a href="{{ url('/admin/hospedajes/1') }}" class="lk-hospedajes lk-hospedaje_add lk-hospedaje_search lk-hospedaje_edit lk-attractive_gallery_add "><i class="fas fa-hotel"></i>    Hospedaje</a>
			</li>
			@endif


			@if(kvfj(Auth::user()->permissions, 'user_list'))
			<li>
				<a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-user_edit lk-user_permissions"><i class="fa fa-users" aria-hidden="true"></i>    Usuarios</a>
			</li>
			@endif


			@if(kvfj(Auth::user()->permissions, 'sliders_list')) 
			<li> 
				<a href="{{ url('/admin/sliders') }}" class="lk-sliders_list lk-slider_edit"><i class="far fa-images"></i>  Sliders</a>
			</li>
			@endif

			@if(kvfj(Auth::user()->permissions, 'settings'))
			<li>
				<a href="{{ url('/admin/settings') }}" class="lk-settings"><i class="fas fa-cogs"></i>  Configuraciones</a>
			</li>
			@endif

			

			

		</ul>
	</div>
	
</div>

