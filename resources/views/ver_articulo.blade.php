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
            <h6 class="titulo-yellow">Descripcion:</h6>
            <h6 class="datos-perfil">&nbsp;{{$thing->description}}</h6>
        </div>

        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Este es el estado en el que se encuentra, posiblemente puede variar con el de la foto.">aa</span></i>
            <h6 class="titulo-yellow">Estado:</h6>
            <h6 class="datos-perfil">&nbsp;{{$thing_status[$thing->status]}}</h6>
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
            <h6 class="datos-perfil">{{$thing_state[$thing->thing_state]}}.</h6>
        </div>
        <div class="datos-row">
            <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Esta es la cantidad de personas que quieren este articulo.">aa</span></i>
            <h6 class="titulo-yellow">Solicitudes recibidas:</h6>&nbsp;
            <h6 class="datos-perfil">{{$propertyRequest->count()}} solicitudes.</h6>
        </div>
        <br><br>
        @empty
        <h6 class="message_h">Nada que mostrar</h6>
        @endif
		
        @if($thing->user_id == auth()->user()->id || auth()->user()->user_type == 5)
        <!-- solicitudes -->
        <h6>Recibido el - Usuario - Estado</h6>
        @forelse($propertyRequest as $request)
            <div class="datos-row-father">
                <div class="datos-row-items">
                    <h6 class="item-description"><strong>{{$request->created_at->format('d/m/Y')}}</strong></h6>
                    <h6 class="item-description"><strong>{{$request->name}}</strong></h6>
                    <h6 class="text-info"><strong>{{$REQUEST_STATE_2[$request->request_state]}}</strong></h6>
                    @if($request->request_state==1)
                    <a class="delete-item-th" href="{{ route('revisar_solicitud', $request->id) }}"><i class="icon-green fas fa-chevron-right fa-lg"></i></a>
                    @else
                        
                    @endif
                </div>
            </div>
            @empty
            <br>
                <h6 class="message_h">Aún no tienes solicitudes, prueba publicando un articulo.</h6>
            @endforelse
            <br><br>
        @endif
        <!-- fin solicitudes -->
        <!-- Datos -->
	</div>
	<div class="col-sm-4 col-md-4">
        <h6>Fotografia de este producto:</h6><br>
        <img class="img-articulo" src="{{isset($thing->photo) ? Storage::url("$thing->photo") : Storage::url("images/articulos/defaultArticulo.jpg")}}" alt="">
        <br><br>
    <!-- filtramos por tipo de usuario -->
        @if($thing->user_id == auth()->user()->id)
        <div class="datos-row">
            <h6 class="message_h">No puedes solicitar propiedad de tu propio artículo.</h6>
        </div><br><br>
        @elseif($thing->thing_state < 4)
            <div class="datos-row">
                <a type="button" href="{{ route('nueva_solicitud', [$thing->thing_id, $thing->thing_name]) }}" class="form-control btn-primary-yellow text-a-no-hover-black"><i class="fas fa-user-plus fa-lg"></i>&nbsp;Solicitar</a>
            </div><br><br>
        @else
        <h6 class="message_h">No hay acciónes disponibles.</h6><br><br>
        @endif
    <!-- fin filtrado por tipo de usuario -->

    <!-- admin -->
        @if(auth()->user()->user_type == 5 && $thing->thing_state < 4)
             <div class="datos-row">
                <a type="button" href="{{route('baja_articulo',[$thing->thing_id,$thing->post_id])}}" class="form-control btn-alert text-a-no-hover text-a-white">Dar de baja este Articulo</a>
            </div><br><br>
        @endif
    <!-- admin -->
	</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
</div>

@include('footer.footer')

