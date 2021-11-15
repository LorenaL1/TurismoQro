@extends('admin.master')

@section('title', 'Hospedaje')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/hospedajes/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Hospedaje</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa fa-cubes" aria-hidden="true"></i>    Hospedajes</h2>
			<ul>
				@if(kvfj(Auth::user()->permissions, 'hospedaje_add'))
				<li>
	            	<a href="{{ url('/admin/attractive/add') }}">
	            		<i class="fas fa-plus-square"></i>  Agregar Hospedaje
	            	</a>
	            </li>
	            @endif
	            <li>
	            	<a href="#">Filtrar <i class="fas fa-chevron-down"></i></a>
	            	<ul class="shadow">
	            		<li><a href="{{ url('/admin/hospedajes/1') }}"><i class="fas fa-globe-americas"></i>  Públicos</a></li>
	            		<li><a href="{{ url('/admin/hospedajes/0') }}"><i class="fas fa-eraser"></i>  Borradores</a></li>
	            		<li><a href="{{ url('/admin/hospedajes/trash') }}"><i class="fas fa-trash"></i>  Papelera</a></li>
	            		<li><a href="{{ url('/admin/hospedajes/all') }}"><i class="fas fa-list"></i>  Todos</a></li>
	            	</ul>
	            </li>
	            <li>
	            	<a href="#" id="btn_search">
	            		<i class="fas fa-search"></i>  Buscar
	            	</a>
	            </li>
			</ul>
		</div>
		<div class="inside">
			<div class="form_search" id="form_search">
				{!! Form::open(['url' => '/admin/hospedaje/search']) !!}
	            <div class="row">
	            	<div class="col-md-4">
	            		{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required'] ) !!}
	            	</div>
	            	<div class="col-md-4">
	            		{!! Form::select('filter', ['0' => 'Nombre del producto'], 0, ['class' => 'form-select']) !!}
	            	</div>
	            	<div class="col-md-2">
	            		{!! Form::select('status', ['0' => 'Borrador', '1' => 'Públicos'], 0, ['class' => 'form-select']) !!}
	            	</div>
	            	<div class="col-md-2">
	            		{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
	            	</div>
	            </div>
	            {!! Form::close() !!}
			</div>
            

			<table class="table table-striped mtop16">
				<thead>
					<tr>
						<td>ID</td>
						<td></td>
						<td>Nombre</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($hospedajes as $h)
					<tr>
						<td width="50">{{ $h->id }}</td>
						<td width="64">
							<a href="{{ url('/uploads/'.$h->file_path.'/'.$h->image) }}" data-fancybox="gallery">
							<img src="{{ url('/uploads/'.$h->file_path.'/t_'.$h->image) }}" width="64">
						    </a>
						</td>
						<td>{{ $h->name }} @if($h->status == "0") <i class="fas fa-eraser"data-toggle="tooltip" data-bs-placement="top" title="Estado:Borrador"></i> @endif</td>
						
						
						<td>
							<div class="opts">
								@if(kvfj(Auth::user()->permissions, 'hospedaje_edit'))
										<a href="{{ url('/admin/hospedaje/'.$h->id.'/edit') }}" data-toggle="tooltip" data-bs-placement="top" title="Editar">
											<i class="fas fa-edit"></i>
										</a>
										@endif

										@if(kvfj(Auth::user()->permissions, 'hospedaje_delete'))
										<a href="{{ url('/admin/hospedaje/'.$h->id.'/delete') }}" data-toggle="tooltip" data-bs-placement="top" title="Eliminar">
											<i class="fas fa-trash-alt"></i>
										</a>
										@endif
								</div>
						</td>
					</tr>
					@endforeach
					
				</tbody>
					
			</table>
		</div>
	</div>
</div>
@endsection