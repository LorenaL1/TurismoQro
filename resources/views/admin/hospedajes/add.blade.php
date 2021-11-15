@extends('admin.master')

@section('title', 'Agregar Hospedaje')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/hospedajes/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Hospedaje</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/hospedaje/add') }}"><i class="fas fa-plus-square"></i>  Agregar Hospedaje</a>
</li>
@endsection



@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"> Agregar Hospedaje</h2>
		</div>
		<div class="inside">

            {!! Form::open(['url' => '/admin/hospedaje/add', 'files' => true]) !!}
            <div class="row">

            	<div class="col-md-12">
            		<label for="name">Nombre del sitio:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name', null, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div>
            </div>

            <div class="row mtop16">

                  <div class="col-md-4">
                        <label for="type">Tipo</label>
                        <div class="input-group">                 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>
                         {!! Form::select('type', ['0' => 'Hotel', '1' => 'Posada'], null, ['class' =>'form-select']) !!}
                     </div>

                  </div>

                 <div class="col-md-4">
            		<label for="name_place">Nombre del lugar:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name_place', null, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div> 

            	<div class="col-md-4">
            		<label for="mapa">Dirección del sitio:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('mapa', null, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div>

            	



            <div class="row mtop16 ">

            	<div class="col-md-6">
            		<label for="phone">Teléfono:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i>
            			</span>
            			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
            		</div>
                  
            	</div>
                  
                  <div class="col-md-6">
                        <label for="img">Imagen:</label>
                        <div class="input-group">
                        {!! Form::file('img', ['class' => 'form-control', 'id' => 'inputGroupFile01', 'accept' => 'image/*']) !!}
                        
                        </div>
                  </div>

                  <label for="ubicacion" class="mtop16">Link del mapa:</label>
                        <div class="input-group"> 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-sd-card"></i>
                              </span>
                              {!! Form::textarea('ubicacion', null, ['class' => 'form-control', 'rows' => '3']) !!}
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