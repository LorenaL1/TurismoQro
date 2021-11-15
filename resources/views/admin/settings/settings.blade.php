@extends('admin.master')

@section('title', 'Configuraciones')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/settings') }}"><i class="fas fa-cogs"></i>   Configuraciones</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-cogs"></i>   Configuraciones</h2>
		</div>

		

	<div class="inside">
                  {!! Form::open(['url' => '/admin/settings']) !!}
                  <div class="row">
                        <div class="col-md-4">
                        <label for="name">Nombre del sitio:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-store"></i>
                              </span>

                         {!! Form::text('name', Config::get('circuito.name'), ['class' => 'form-control']) !!}
                         
                     </div>
                  </div>

                
                  <div class="col-md-4">
                        <label for="map">Ubicaciones:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-coins"></i>
                              </span>

                         {!! Form::text('map', Config::get('circuito.map'), ['class' => 'form-control']) !!}
                         
                     </div>
                  </div>

                  <div class="col-md-3">
                        <label for="maintenance_mode">Modo mantenimiento</label>
                        <div class="input-group">                 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-hammer"></i>
                              </span>
                         {!! Form::select('maintenance_mode', ['0' => 'Desactivado', '1' => 'Activo'], Config::get('circuito.maintenance_mode'), ['class' =>'form-select']) !!}
                     </div>
                  </div>
                  

                  </div>

                  <div class="row mtop16">
                        
                  </div>


            <hr>
                  <div class="row">
                        <div class="col-md-4">
                        <label for="products_per_page">Atributos para mostrar por pagina:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-door-open"></i>
                              </span>

                         {!! Form::number('products_per_page', Config::get('circuito.products_per_page'), ['class' => 'form-control', 'min' =>1, 'required']) !!}
                         
                     </div>
                  </div>

                        <div class="col-md-4">
                              <label for="products_per_page_random">Atributos para mostrar por pagina (Random):</label>
                              <div class="input-group">
                                    
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-door-open"></i>
                                    </span>

                               {!! Form::number('products_per_page_random', Config::get('circuito.products_per_page_random'), ['class' => 'form-control', 'min' =>1, 'required']) !!}
                               
                           </div>
                        </div>
                  </div>

                  <hr>

                 

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