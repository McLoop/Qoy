@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-2 col-md-2"></div>
	<div class="col-sm-4 col-md-4">
		<h5></h5>
		<h6 class="message_h">Revisa bien los detalles de los articulos antes de solicitarlos.</h6>
		<!-- foto y nombre -->
        @forelse($things as $thing)
        <h4><strong>{{$thing->thing_name}}</strong></h4>
        <h6 class="message_h">Detalles de este articulo.</h6><br>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta descripción la añadio el dueño.">aa</span></i>
            <h6 class="titulo-yellow">Descripcion:</h6>&nbsp;
            <h6 class="datos-perfil">{{$thing->description}}</h6>
        </div>

        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Este es el estado en el que se encuentra, posiblemente puede variar con el de la foto.">aa</span></i>
            <h6 class="titulo-yellow">Estado:</h6>&nbsp;
            <h6 class="datos-perfil">{{$thing_status[$thing->status]}}</h6>
        </div>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta es la fecha en que se publico el articulo.">aa</span></i>
            <h6 class="titulo-yellow">Publicado:</h6>&nbsp;
            <h6 class="datos-perfil">{{$thing->updated_at->diffForHumans()}}</h6>
        </div>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta es el usuario que publico este articulo.">aa</span></i>
            <h6 class="titulo-yellow">Publicado por:</h6>
            <div class="perfil-foto-nombre">
                <br>
                    @if($thing->provider=='qoy')
                      <img class="img-circle-post" src="{{Storage::url($thing->avatar)}}" width="20" height="20">
                    @else
                      <img class="img-circle-post" src="{{$thing->avatar}}" width="15" height="15">
                    @endif
                              
                      <a class="text-theme" href="{{ route('user_perfil', $thing->user_id) }}">{{$thing->name}}</a>
            </div>
        </div>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta es el estado en el que se encuentra la publicación.">aa</span></i>
            <h6 class="titulo-yellow">Estado actual:</h6>&nbsp;
            <h6 class="datos-perfil">{{$thing_state[$thing->thing_state]}}</h6>
        </div>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta es la cantidad de personas que quieren este articulo.">aa</span></i>
            <h6 class="titulo-yellow">Solicitudes recibidas:</h6>&nbsp;
            <h6 class="datos-perfil"> solicitudes</h6>
        </div>
        <br><br>
        @empty
        <h6 class="message_h">Nada que mostrar</h6>
        @endif
		
        <!-- Datos -->
	</div>
	<div class="col-sm-4 col-md-4">
        <h6>Fotografia de este producto:</h6><br>
        <img class="img-articulo" src="{{isset($thing->photo) ? Storage::url("$thing->photo") : Storage::url("images/articulos/defaultArticulo.jpg")}}" alt="">
        <br><br>
        <div class="datos-row">
            <a type="button" href="{{ route('nueva_solicitud', $thing->thing_id) }}" class="form-control btn-primary-yellow text-a-no-hover-black"><i class="fas fa-user-plus fa-lg"></i>&nbsp;Solicitar este artículo</a>
        </div><br><br>
	</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
</div>

@include('footer.footer')

