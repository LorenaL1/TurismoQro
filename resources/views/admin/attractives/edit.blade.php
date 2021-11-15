@extends('admin.master')

@section('title', 'Editar Atractivo')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/attractives/1') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Atractivos</a>
</li>

@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			
		
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="far fa-edit"></i> Editar Atractivo</h2>
		</div>
		<div class="inside">

            {!! Form::open(['url' => '/admin/attractive/'.$at->id.'/edit', 'files' => true]) !!}

            <div class="row">

            	<div class="col-md-12">
            		<label for="name">Nombre del atractivo:</label>
            		<div class="input-group">
            			
            			<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
            			</span>

            		 {!! Form::text('name', $at->name, ['class' => 'form-control']) !!}
            		 
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

            <div class="row mtop16">
            	

            	

                  <div class="col-md-6">
                        <label for="name">Imagen:</label>
                        <div class="input-group">
                        {!! Form::file('img', ['class' => 'form-control', 'id' => 'inputGroupFile01', 'accept' => 'image/*']) !!}
                        
                        </div>
                  </div>

                  <div class="col-md-3">
                        <label for="status">Estado</label>
                        <div class="input-group">                 
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i>
                              </span>
                         {!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], $at->status, ['class' =>'form-select']) !!}
                     </div>

                     

                  </div>
                  <label for="mapa" class="mtop16">Link del mapa:</label>
                        <div class="input-group">
                              
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-sd-card"></i>
                              </span>

                         {!! Form::textarea('mapa', html_entity_decode($at->mapa), ['class' => 'form-control', 'rows' => '3']) !!}
                     </div>

            	
            </div>

            



            <div class="row mtop16">
            	<div class="col-md-12">
            		<label for="content">Descripción:</label>
            		{!! Form::textarea('content', $at->content, ['class' => 'form-control', 'id' => 'editor']) !!}
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

<div class="col-md-3">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="far fa-image"></i>  Imagen principal</h2>
			<div class="inside">
				<img src="{{ url('/uploads/'.$at->file_path.'/'.$at->image) }}" class="img-fluid">
			</div>
		</div>
      </div>

      <div class="panel shadow mtop16">
            <div class="header">
                  <h2 class="title"><i class="far fa-images"></i>  Galeria</h2>
                  <div class="inside product_gallery">
                        @if(kvfj(Auth::user()->permissions, 'attractive_gallery_add'))
                        {!! Form::open(['url' => '/admin/attractive/'.$at->id.'/gallery/add', 'files' => true, 'id' => 'form_product_gallery']) !!}
                        {!! Form::file('file_image', ['id' => 'product_file_image', 'accept' => 'image/*', 'style' => 'display: none;', 'required']) !!}
                        {!! Form::close() !!}  


                        <div class="btn-submit">
                              <a href="#" id="btn_product_file_image"><i class="fas fa-plus"></i></a>
                        </div>
                        @endif
                        <div class="tumbs">
                              
                              @foreach($at->getGallery as $img)
                              <div class="tumb">
                                    @if(kvfj(Auth::user()->permissions, 'attractive_gallery_delete'))
                                    <a href="{{ url('/admin/attractive/'.$at->id.'/gallery/'.$img->id.'/delete') }}" data-toggle="tooltip" data-bs-placement="top" title="Eliminar">
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