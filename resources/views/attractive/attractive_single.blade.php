@extends('master')

@section('title', $attractive->name)

@section('custom_meta')
<meta name="product_id" content="{{ $attractive->id }}">
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
							<a href="{{ url('/uploads/'.$attractive->file_path.'/'.$attractive->image) }}" data-fancybox="gallery">
								<img src="{{ url('/uploads/'.$attractive->file_path.'/'.$attractive->image) }}" class="img-fluid">
							</a>
						</div>
						@if(count($attractive->getGallery) > 0)
							@foreach($attractive->getGallery as $gallery)
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
					<h2 class="title">{{ $attractive->name }}</h2>
					<div class="category">
						<ul>
							<li><a href="{{ url('/') }}"><i class="fas fa-home"></i>  Inicio</a></li>
							<li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
							<li><a href="{{ url('/attractive') }}"><i class="fas fa-store"></i>  Atractivos</a></li>
							<li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
							<li><a href="{{ url('/store') }}"><i class="fas fa-folder-open"></i>  {{ $attractive->cat->name }}</li>
							@if($attractive->subcategory_id != "0")
							<li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
							<li><a href="{{ url('/attractive') }}"><i class="fas fa-folder-open"></i>  {{ $attractive->getSubcategory->name }}<a/></li>
							@endif
						</ul>
					</div>

					
					<div class="content">
						{!! html_entity_decode($attractive->content) !!}
					</div>

					

					

				</div>
				<div class="mapa">
						{!! html_entity_decode($attractive->mapa) !!}
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
