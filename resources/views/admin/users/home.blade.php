@extends('admin.master')

@section('title', 'Usuarios')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fa fa-users" aria-hidden="true"></i>  Usuarios</a>
</li>


@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa fa-users" aria-hidden="true"></i>  Usuarios</h2>
		</div>
		<div class="inside">
			<div class="row">
				<div class="col-md-2 offset-md-10">
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
							<i class="fas fa-filter"></i>  Filtrar
						</button>
						 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						 	<li><a class="dropdown-item" href="{{ url('/admin/users/all') }}"><i class="fas fa-users"></i>  Todos</a></li>
						 	<li><a class="dropdown-item" href="{{ url('/admin/users/0') }}"><i class="fas fa-user-times"></i>  No verificados</a></li>
						 	<li><a class="dropdown-item" href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i>  Verificados</a></li>
						 	<li><a class="dropdown-item" href="{{ url('/admin/users/100') }}"><i class="fas fa-user-clock"></i>  Suspendidos</a></li>
						 </ul>
					</div>
				</div>
			</div>
			<table class="table mtop16">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td>
						<td>Rol</td>
						<td>Estado</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ getRoleUserArray(null,$user->role) }}</td>
						<td>{{ getUserStatusArray(null,$user->status) }}</td>
						<td>
							<div class="opts">
							@if(kvfj(Auth::user()->permissions, 'user_edit'))
							<a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-bs-placement="top" title="Editar">
								<i class="fas fa-edit"></i>
							</a>
		
							@endif
							@if(kvfj(Auth::user()->permissions, 'user_permissions'))
							<a href="{{ url('/admin/user/'.$user->id.'/permissions') }}" data-toggle="tooltip" data-bs-placement="top" title="Permisos de usuario">
								<i class="fas fa-user-cog"></i> 
							</a>
							@endif
							</div>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="7">{!! $users->render() !!}</td>
					</tr>
				</tbody>


@endsection

