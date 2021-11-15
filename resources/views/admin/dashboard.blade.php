@extends('admin.master')

@section('title', 'Escritorio')


@section('content')

<div class="container-fluid">
	@if(kvfj(Auth::user()->permissions, 'dashboard_small_stats'))
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-chart-bar"></i>  Accesos Rápidas</a></h2>
		</div>
	</div>
	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				 <div class="header">
					<h2 class="title"><i class="fas fa-user"></i>  Usuarios registrados</a></h2>
				</div>
				<div class="inside">
					<div class="big_count">{{ $users }}</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-grip-horizontal"></i>  Atractivos Totales</a></h2>
				</div>
					<div class="inside">
						<div class="big_count">{{ $attractives }}</div>
					</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-hotel"></i>  Alojamientos Totales</a></h2>
				</div>
					<div class="inside">
						<div class="big_count">{{ $hospedajes }}</div>
					</div>
			</div>
		</div>
	
	@endif
</div>

@endsection