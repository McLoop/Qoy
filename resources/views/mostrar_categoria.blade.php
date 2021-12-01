@include('head.head')
@include('partials.message')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-6 col-md-6">
			<h6>Publicaciones en esta categoria</h6><br>
			<!-- Inicio publicaciones interes primario 1-->
			@forelse($things1 as $thing)
			<div id="container-post">
				<div class="product-details">
			
					<h6>{{ $thing->thing_name }}</h6>
					<!--<span class="hint-star star">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star-o" aria-hidden="true"></i>
					</span>-->
					<br><span class="hora-pub"><i class="icon-yellow fas fa-clock fa-sm"></i> {{ $thing->updated_at->diffForHumans() }}</span>
					<p class="information">{{ $thing->description }}</p>
					<!-- usuario -->
					<div class="perfil-foto-nombre">
					@if($thing->provider=='qoy')
                      <img class="img-circle-post" src="{{Storage::url($thing->avatar)}}" width="15" height="15">
                    @else
                      <img class="img-circle-post" src="{{$thing->avatar}}" width="15" height="15">
                    @endif
                              
                      <a class="text-theme" href="{{ route('user_perfil', $thing->user_id) }}">{{$thing->name}}</a>
                     </div>
					<!-- Fin usuario -->
					<!-- botones -->						
					<div class="control">
						<button class="btn">
					   <span class="buy"><a class="text-a-no-hover-white text-a-white" href="{{ route('ver_articulo', $thing->thing_id) }}">Ver mas</a></span>
					 </button>
					</div>
					<!-- fin botones -->
				</div>
			<!-- Imagen -->						
				<div class="product-image">
					<img src="{{isset($thing->photo) ? Storage::url("$thing->photo") : Storage::url("images/articulos/defaultArticulo.jpg")}}" alt="">
			<!-- Fin Imagen -->	
			<!-- Info -->	
				<div class="info">
					<h5> Detalles</h5>
					<ul>
						<li><strong>Estado : </strong>{{ $thing->status }}</li>
						<li><strong>Ubicación : </strong>{{ $thing->ubication }}</li>
						<li><strong>Categoria: </strong>{{ $thing->category_id }}</li>
						<li><strong>Esta: </strong>{{ $thing->thing_state }}</li>
						
					</ul>
				</div>
			<!-- Fin Info -->	
				</div>
			</div>
			@empty
			<h6 class="message_h">No hay publicaciones recientes en esta categoria.</h6><br>
			@endforelse
			<!-- Fin publicaciones interes primario -->

		</div>
		<div class="col-sm-3 col-md-3"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

