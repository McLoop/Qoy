@include('head.head')
@include('partials.message')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-6 col-md-6">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<h6 class="titulo-pub">¿Tienes algo que dar? Publicalo ahora!</h6>
				</div>
				<div class="col-sm-6 col-md-6 center-con">
					<a type="button" class="form-control btn-pub btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('nuevo_post') }}">Publicar</a>
				</div> 
			</div><br>

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
			<h6 class="message-h">No hay publicaciones con el interes primario.</h6><br>
			@endforelse
			<!-- Fin publicaciones interes primario -->

			<!-- Inicio publicaciones interes Secundario 2-->
			@forelse($things2 as $thing)
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
			<h6 class="message-h">No hay publicaciones con el interes secundario.</h6><br>
			@endforelse
			<!-- Fin publicaciones interes Secundario -->

			<!-- Inicio publicaciones cercanas 3-->
			@forelse($things3 as $thing)
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
			<h6 class="message-h">No hay publicaciones cercanas.</h6><br>
			@endforelse	
			<!-- Fin publicaciones cercanas -->

			<!-- Inicio publicaciones 4-->
			@forelse($things4 as $thing)
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
			<h6 class="message-h">Ya no hay mas publicacíones.</h6>
			@endforelse
			<!-- fin publicaciones  -->

		</div>
		<div class="col-sm-3 col-md-3"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

