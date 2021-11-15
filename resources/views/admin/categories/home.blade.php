@extends('admin.master')

@section('title', 'Categorias')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/categories/0') }}"><i class="fa fa-folder" aria-hidden="true"></i>    Categorias - Municipio</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel shadow">
					<div class="header">
						<h2 class="title"> Agregar Categoría - Municipio</h2>
					</div>
			<div class="inside">
	           @if(kvfj(Auth::user()->permissions, 'category_add'))
	           {!! Form::open(['url' => '/admin/category/add/'.$module, 'files' => true]) !!}
	           <label for="name">Nombre:</label>
	            <div class="input-group"> 
	            	<span class="input-group-text" id="basic-addon1">
	            		<i class="fas fa-font"></i>
	            	</span>
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
	            </div>

	            	 <label for="module" class="mtop16">Categoría padre:</label>
	            		<div class="input-group">
	            			
	            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
	            			</span>
	            			<select name="parent" class="form-select">
	            				<option value="0">Sin Categoría padre</option>
	            				@foreach($cats as $cat)
	            				<option value="{{ $cat->id }}">{{ $cat->name }}</option>
	            				@endforeach
	            			</select>


	            	   </div>

	            	   <label for="module" class="mtop16">Módulo:</label>
	            		<div class="input-group">
	            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
	            			</span>
	            		 	{!! Form::select('module', getModulesArray(), $module, ['class' =>'form-select', 'disabled']) !!}
	            	   </div>

	            	   <label for="icon" class="mtop16">Ícono:</label>
	            	   <div class="input-group">
	            		{!! Form::file('icon', ['class' => 'form-control', 'id' => 'inputGroupFile01', 'accept' => 'image/*']) !!}
	            		
	            		</div> 

	            	   {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
	           {!! Form::close() !!}
	          @endif
			</div>
	</div>
		</div>

<!--lISTA DE CATEGORIAS-->
		<div class="col-md-8">
			<div class="panel shadow">
		       <div class="header">
			      <h2 class="title">Lista de Categorias - Municipio</h2>
			  </div>
		      
		      <div class="inside">
		      	<ul class="nav nav-pills nav-fill">
		      		@foreach(getModulesArray() as $m => $k)
		      		<a class="nav-link" href="{{ url('/admin/categories/'.$m) }}">{{ $k }}</a>
		      		@endforeach
		      	</ul>
		      	<table class="table mtop16">
		      		<thead>
		      			<tr>
		      				<td width="64"></td>
		      				<td>Nombre</td>
		      				<td width="160"></td>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			@foreach($cats as $cat)
		      			<tr>
		      				<td>
		      					@if(!is_null($cat->icono))
		      					<img src="{{ url('/uploads/'.$cat->file_path.'/'.$cat->icono) }}" class="img-fluid">
		      					@endif
		      				</td>
		      				<td>{{ $cat->name }}</td>
		      				<td>
			      					<div class="opts">
			      						@if(kvfj(Auth::user()->permissions, 'category_edit'))
										<a href="{{ url('/admin/category/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-bs-placement="top" title="Editar">
											<i class="fas fa-edit"></i>
										</a>

										<a href="{{ url('/admin/category/'.$cat->id.'/subs') }}" data-toggle="tooltip" data-placement="top" title="Subcategorias">
											<i class="fas fa-stream"></i>
										</a>

										@endif
										

										@if(kvfj(Auth::user()->permissions, 'category_delete'))
										<a href="{{ url('/admin/category/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-bs-placement="top" title="Eliminar">
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

</div>
</div>
@endsection