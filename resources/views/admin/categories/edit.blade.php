@extends('admin.master')

@section('title', 'Categorias')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/categories/0') }}"><i class="fa fa-folder" aria-hidden="true"></i>    Categorias</a>
</li>
@if($cat->parent != "0")
<li class="breadcrumb-item">
    <a href="{{ url('/admin/category/'.$cat->parent.'/subs') }}"><i class="fa fa-folder" aria-hidden="true"></i>  {{ $cat->getParent->name }}</a>
</li>

@endif
<li class="breadcrumb-item">
    <a href="{{ url('/admin/category/'.$cat->id.'/edit') }}"><i class="fa fa-folder" aria-hidden="true"></i>  Editando  {{ $cat->name }}</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel shadow">
		<div class="header">
			<h2 class="title"> Editar Categoria - Municipio</h2>
		</div>
		<div class="inside">
           
           {!! Form::open(['url' => '/admin/category/'.$cat->id.'/edit', 'files' => true]) !!}
           <label for="name">Nombre:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
            		 
            	   </div>


            	   <label for="icon" class="mtop16">Ícono:</label>
                   <div class="input-group">
                    {!! Form::file('icon', ['class' => 'form-control', 'id' => 'inputGroupFile01', 'accept' => 'image/*']) !!}
                    
                    </div>

                    <label for="order" class="mtop16">Orden:</label>
                    <div class="input-group">
                        
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                        </span>

                     {!! Form::number('order', $cat->order, ['class' => 'form-control']) !!}
                     
                   </div>

            	   {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
           {!! Form::close() !!}
		</div>
	</div>
		</div>








        @if(!is_null($cat->icono))
        <div class="col-md-4">
            <div class="panel shadow">
        <div class="header">
            <h2 class="title"> Icono </h2>
        </div>
        <div class="inside">
           
           <img src="{{ url('/uploads/'.$cat->file_path.'/'.$cat->icono) }}" class="img-fluid">
        </div>
    </div>
        </div>
        @endif

	</div>
</div>
@endsection