@extends('master')

@section('title', 'Circuito Turistico - '.$category->name)

@section('custom_meta')
<meta name="category_id" content="{{ $category->id }}">
@stop
 
@section('content')

<div class="store">
	<div class="row mtop32">
		<div class="col-md-3">
			<div class="categories_list shadow">
				<h2 class="title"><i class="fas fa-stream"></i>  {{ $category->name }}</h2>
				<ul>
					@if($category->parent != "0")
						<li>
							<a href="{{ url('/attractiveh/category/'.$category->getParent->id.'/'.$category->getParent->slug) }}">
								<small><i class="fas fa-angle-left"></i>  Regresar a {{ $category->getParent->name }}</small>
							</a>
						</li>
					@endif

					@if($category->parent == "0")
						<li>
							<a href="{{ url('/attractiveh/') }}">
								<small><i class="fas fa-angle-left"></i>  Regresar a Atractivos</small>
							</a>
						</li>
						<li>
							<a href="{{ url('/attractiveh/category/'.$category->id.'/'.$category->slug) }}">
								<small><i class="fas fa-chevron-down"></i>  Lugares</small>
							</a>
						</li>
					@endif

					@foreach($categories as $cat)
						<li>
							<a href="{{ url('/attractiveh/category/'.$cat->id.'/'.$cat->slug) }}">
								<img src="{{ url('/uploads/'.$cat->file_path.'/'.$cat->icono) }}" alt=""> 
							{{ $cat->name }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="col-md-9">
			<div class="store_white">
				<section>
				 	<h2 class="home_title"><i class="fas fa-store-alt"></i>  {{ $category->name }}</h2>
				 	<div class="products_list" id="products_list"></div>
					 	<div class="load_more_products">
							<a href="#" id="load_more_products"><i class="fas fa-plus"></i> Más Atractivos</a>
						</div>
				</section>
			</div>
		</div>

	</div>
</div>
@endsection