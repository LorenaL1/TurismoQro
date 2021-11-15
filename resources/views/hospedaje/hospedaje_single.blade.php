@extends('master')

@section('title', $hospedaje->name)

@section('custom_meta')
<meta name="product_id" content="{{ $hospedaje->id }}">
@stop
 
@section('content')
<div class="product_single shadow-lg">
	<div class="inside">
		<div class="container">
			<div class="row">
				<!-- Featured Img & Gallery --> 
				<div class="col-md-4 pleft0">
					<div class="slick-slider">
						<div>
							<a href="{{ url('/uploads/'.$hospedaje->file_path.'/'.$hospedaje->image) }}" data-fancybox="gallery">
								<img src="{{ url('/uploads/'.$hospedaje->file_path.'/'.$hospedaje->image) }}" class="img-fluid">
							</a>
						</div>
						@if(count($hospedaje->getGallery) > 0)
							@foreach($hospedaje->getGallery as $gallery)
								<div>
									<a href="{{ url('/uploads/'.$gallery->file_path.'/t_'.$gallery->file_name) }}" data-fancybox="gallery">
										<img src="{{ url('/uploads/'.$gallery->file_path.'/t_'.$gallery->file_name) }}" class="img-fluid">
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col-md-8">
					<h2 class="title">{{ $hospedaje->name }}</h2>
					<div class="category">
						<ul>
							<li><a href="{{ url('/') }}"><i class="fas fa-home"></i>  Inicio</a></li>
							<li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
							<li><a href="{{ url('/hospedaje') }}"><i class="fas fa-store"></i>  Atractivos</a></li>
							<li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
							
							
						</ul>
					</div>

					
					<div class="content">
						{!! html_entity_decode($hospedaje->content) !!}
					</div>

					

					

				</div>
					<div class="mapa">
						{!! html_entity_decode($hospedaje->mapa) !!}
					</div>
					<div class="mapa mtop32">
						{!! html_entity_decode($hospedaje->ubicacion) !!}
					</div>
			</div>
		</div>
	</div>
</div>
@endsection