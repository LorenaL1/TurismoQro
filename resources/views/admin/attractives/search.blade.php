@extends('admin.master')

@section('title', 'Productos')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/attractives/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Atractivos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa fa-cubes" aria-hidden="true"></i>    Atractivos</h2>
			<ul>
				@if(kvfj(Auth::user()->permissions, 'product_add'))
				<li>
	            	<a href="{{ url('/admin/attractive/add') }}">
	            		<i class="fas fa-plus-square"></i>  Agregar Atractivo
	            	</a>
	            </li>
	            @endif
	            <li>
	            	<a href="#">Filtrar <i class="fas fa-chevron-down"></i></a>
	            	<ul class="shadow">
	            		<li><a href="{{ url('/admin/attractives/1') }}"><i class="fas fa-globe-americas"></i>  Públicos</a></li>
	            		<li><a href="{{ url('/admin/attractives/0') }}"><i class="fas fa-eraser"></i>  Borradores</a></li>
	            		<li><a href="{{ url('/admin/attractives/trash') }}"><i class="fas fa-trash"></i>  Papelera</a></li>
	            		<li><a href="{{ url('/admin/attractives/all') }}"><i class="fas fa-list"></i>  Todos</a></li>
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
				{!! Form::open(['url' => '/admin/attractive/search']) !!}
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
						<td>Categoria / Subcategoría</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($attractives as $at)
					<tr>
						<td width="50">{{ $at->id }}</td>
						<td width="64">
							<a href="{{ url('/uploads/'.$at->file_path.'/'.$at->image) }}" data-fancybox="gallery">
							<img src="{{ url('/uploads/'.$at->file_path.'/t_'.$at->image) }}" width="64">
						    </a>
						</td>
						<td>{{ $at->name }} @if($at->status == "0") <i class="fas fa-eraser"data-toggle="tooltip" data-bs-placement="top" title="Estado:Borrador"></i> @endif</td>
						<td>{{ $at->cat->name }} @if($at->subcategory_id != "0") <i class="fas fa-angle-double-right"></i> {{ $at->getSubcategory->name }} @endif</td>
						
						<td>
							<div class="opts">
								@if(kvfj(Auth::user()->permissions, 'attractive_edit'))
										<a href="{{ url('/admin/attractive/'.$at->id.'/edit') }}" data-toggle="tooltip" data-bs-placement="top" title="Editar">
											<i class="fas fa-edit"></i>
										</a>
										@endif

										@if(kvfj(Auth::user()->permissions, 'attractive_delete'))
										<a href="{{ url('/admin/attractive/'.$at->id.'/delete') }}" data-toggle="tooltip" data-bs-placement="top" title="Eliminar">
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