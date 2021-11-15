@extends('admin.master')

@section('title', 'Editar Hospedaje')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/hospedajes/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Hospedaje</a>
</li>

@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			
		
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="far fa-edit"></i> Editar Hospedaje</h2>
		</div>
		<div class="inside">

            {!! Form::open(['url' => '/admin/hospedaje/'.$h->id.'/edit', 'files' => true]) !!}

            <div class="row">

            	<div class="col-md-12">
            		<label for="name">Nombre del hospedaje:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name', $h->name, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div>
            </div>
             <div class="row mtop16">

                  <div class="col-md-4">
                        <label for="type">Tipo</label>
                        <div class="input-group">                 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>
                         {!! Form::select('type', ['0' => 'Hotel', '1' => 'Posada'], $h->type, ['class' =>'form-select']) !!}
                     </div>

                  </div>

                 <div class="col-md-4">
            		<label for="name_place">Nombre del lugar:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name_place', $h->name_place, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div> 

            	<div class="col-md-4">
            		<label for="mapa">Dirección del sitio:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('mapa', $h->mapa, ['class' => 'form-control']) !!}
            		 
            	   </div>
            	</div>

            	



            <div class="row mtop16 ">

            	<div class="col-md-6">
            		<label for="phone">Teléfono:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i>
            			</span>
            			{!! Form::text('phone', $h->phone, ['class' => 'form-control']) !!}
            		</div>
                  
            	</div> 

            	<div class="col-md-3">
                        <label for="status">Estado</label>
                        <div class="input-group">                 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>
                         {!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], $h->status, ['class' =>'form-select']) !!}
                     </div>

                  </div> 
                  <label for="ubicacion" class="mtop16">Link del mapa:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-sd-card"></i>
                              </span>

                         {!! Form::textarea('ubicacion', html_entity_decode($h->ubicacion), ['class' => 'form-control', 'rows' => '3']) !!}
                     </div>          
            </div>


            <div class="row mtop16">
            	<div class="col-md-12">
            		<label for="content">Descripción:</label>
            		{!! Form::textarea('content', $h->content, ['class' => 'form-control', 'id' => 'editor']) !!}
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
</div>

<div class="col-md-3">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="far fa-image"></i>  Imagen principal</h2>
			<div class="inside">
				<img src="{{ url('/uploads/'.$h->file_path.'/'.$h->image) }}" class="img-fluid">
			</div>
		</div>
      </div>

      <div class="panel shadow mtop16">
            <div class="header">
                  <h2 class="title"><i class="far fa-images"></i>  Galeria</h2>
                  <div class="inside product_gallery">
                        @if(kvfj(Auth::user()->permissions, 'hospedaje_gallery_add'))
                        {!! Form::open(['url' => '/admin/hospedaje/'.$h->id.'/gallery/add', 'files' => true, 'id' => 'form_product_gallery']) !!}
                        {!! Form::file('file_image', ['id' => 'product_file_image', 'accept' => 'image/*', 'style' => 'display: none;', 'required']) !!}
                        {!! Form::close() !!}  


                        <div class="btn-submit">
                              <a href="#" id="btn_product_file_image"><i class="fas fa-plus"></i></a>
                        </div>
                        @endif
                        <div class="tumbs">
                              
                              @foreach($h->getGallery as $img)
                              <div class="tumb">
                                    @if(kvfj(Auth::user()->permissions, 'hospedaje_gallery_delete'))
                                    <a href="{{ url('/admin/hospedaje/'.$h->id.'/gallery/'.$img->id.'/delete') }}" data-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @endif
                                    <img src="{{ url('/uploads/'.$img->file_path.'/t_'.
                                    $img->file_name) }}">
                              </div>
                              @endforeach
                        </div>
                  </div>
            </div>
            
      </div>

</div>
</div>


</div>
@endsection