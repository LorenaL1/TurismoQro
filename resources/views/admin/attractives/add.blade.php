@extends('admin.master')

@section('title', 'Agregar Atractivo')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/attractives/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Atractivos</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/attractive/add') }}"><i class="fas fa-plus-square"></i>  Agregar Atractivo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"> Agregar Atractivo</h2>
		</div>
		<div class="inside">

            {!! Form::open(['url' => '/admin/attractive/add', 'files' => true]) !!}
            <div class="row">

            	<div class="col-md-12">
            		<label for="name">Nombre del Atractivo:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name', null, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div>
            </div>

            <div class="row mtop16">

                  <div class="col-md-6">
                        <label for="category">Categoría:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>

                         {!! Form::select('category', $cats, 0, ['class' =>'form-select', 'id' => 'category']) !!}
                         {!! Form::hidden('subcategory_actual', 0, ['id' => 'subcategory_actual']) !!}
                         
                     </div>
                  </div>

                   <div class="col-md-6">
                        <label for="category">Subcategoría:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>

                              {!! Form::select('subcategory', [], null, ['class' =>'form-select', 'id' => 'subcategory', 'required']) !!}
                         
                        </div>
                  </div>
                  
            </div>



            <div class="row mtop16 ">
                  
                  <div class="col-md-6">
                        <label for="name">Imagen:</label>
                        <div class="input-group">
                        {!! Form::file('img', ['class' => 'form-control', 'id' => 'inputGroupFile01', 'accept' => 'image/*']) !!}
                        
                        </div>
                  </div>

                  <label for="mapa" class="mtop16">Link del mapa:</label>
                        <div class="input-group"> 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-sd-card"></i>
                              </span>
                              {!! Form::textarea('mapa', null, ['class' => 'form-control', 'rows' => '3']) !!}
                        </div>


            
            </div>


            <div class="row mtop16">
            	<div class="col-md-12">
            		<label for="content">Descripción:</label>
            		{!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
            	</div>
            </div>

            <div class="row mtop16">
            	<div class="col-md-12">
            		{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
            	</div>
            </div>

            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection