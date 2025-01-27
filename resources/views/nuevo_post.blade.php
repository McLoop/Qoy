@include('head.head')
@include('partials.message')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-6 col-md-6">
			<h6>Crea una publicación y añade los objetos que tengas!</h6>
			<h6 class="message_h">Puedes añadir uno o mas articulos en una misma publicación, cada articulo que publiques puede pertenecer a una categoria diferente.</h6>
		
		<div>
			<h6>Articulos añadidos:</h6>
			
			<!--Articulos añadidos-->
			@forelse($things as $thing)
			<div class="datos-row-father">
				<img class="img-square" src="{{Storage::url($thing->photo)}}" width="60" height="60">
				<div class="datos-row-items">
					<h6 class="item-name"><strong>{{$thing->thing_name}}</strong></h6>
					<h6 class="item-description"><strong>{{$thing->description}}</strong></h6>
					<a class="edit-item-th" href="{{ route('ver_articulo', $thing->thing_id) }}"><i class="icon-info fas fa-eye fa-lg"></i></a>
					@if(isset($thing))
						@if($thing->thing_state!=4)
						<a class="edit-item-th" href="{{route('editar_articulo',[$thing->thing_id,$idPost])}}"><i class="icon-green fas fa-edit fa-lg"></i></a>
						<a class="delete-item-th" href="{{route('quitar_articulo',[$thing->thing_id,$idPost])}}"><i class="icon-red fas fa-times fa-lg"></i></a>
						@endif
					@endif
				</div>
			</div>
			@empty
			<br>
				<h6 class="message_h">Aún no tienes articulos en esta publicación.</h6>
			@endforelse
			<!--Fin articulos añadidos-->
		</div>
			<div class="row">
				@if(isset($thing))
					@if($thing->thing_state==0)
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('cancelar_post',$idPost) }}">Cancelar</a>
					</div>
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('guardar_post',$idPost) }}">Publicar Post</a>
					</div>
					@endif

					@if($thing->thing_state==1)
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{route('publicaciones_propias')}}">Cancelar</a>
					</div>
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('eliminar_post',$idPost) }}">Eliminar publicación</a>
					</div>
					@endif
					@if($thing->thing_state!=4)
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('nuevo_articulo',$idPost) }}">Agregar Articulo</a>
					</div>
					@endif
				@else
					<div class="col-sm-4 col-md-4"></div>
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('cancelar_post',$idPost) }}">Cancelar</a>
					</div>
					<div class="col-sm-4 col-md-4">
						<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('nuevo_articulo',$idPost) }}">Agregar Articulo</a>
					</div>
				@endif
				<!--<div class="col-sm-4 col-md-4">
					<button type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" onclick="notify('a')">Publicar Post</button>
				</div>-->
				
			</div>
		</div>
		<div class="col-sm-3 col-md-3"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

