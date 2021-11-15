@extends('master')

@section('title', 'Circuito Turistico')
 
@section('content') 

<div class="store">
	<div class="row mtop32">
		<div class="col-md-12 mtop32">
			<div class="store_white">
				<section>
				 	<h2 class="home_title"><i class="fas fa-store-alt"></i>  Hospedajes</h2>
				 	
					 	<div class="products_list" id="products_list">
				 		@foreach($hospedajesh as $hospedaje)
					 		<div class="attractive">
					 			<div class="image">
					 				<div class="overlay">
					 					<div class="btns">
					 						<a href="{{ url('/hospedaje/'.$hospedaje->id.'/'.$hospedaje->slug) }}">
					 							<i class="fas fa-eye"></i>
					 						</a>
					 						

					 						
					 					</div>
					 				</div>
					 				<img src="{{ url('/uploads/'.$hospedaje->file_path.'/t_'.$hospedaje->image) }}" alt="">
					 			</div>
					 			<a href="{{ url('/hospedaje/'.$hospedaje->id.'/'.$hospedaje->slug) }}">
					 				<div class="title">{{ $hospedaje->name }}</div>
					 				
					 			</a>
					 		</div>
				 		@endforeach
				 	</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection