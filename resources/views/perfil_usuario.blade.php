@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-2 col-md-2"></div>
	<div class="col-sm-4 col-md-4">
		<h5>Perfil de usuario</h5>
		<!-- foto y nombre -->
                @if($user->provider=='qoy')
                <img class="img-circle" src="{{Storage::url($user->avatar)}}" alt="" width="120" height="120">
                @else
                <img class="img-circle" src="{{$user->avatar}}" alt="" width="120" height="120">
                @endif
		
        <a class="text-theme perfil-nombre" href="#">{{$user->name}}</a>
        <!-- Datos -->
        <div class="datos-row">
        	<i class="icon-perfil fas fa-envelope fa-lg"></i>
        	<h6 class="datos-perfil">{{$user->email}}</h6>
        </div>
        <div class="datos-row">
        	@if($user->provider=='google')
				<i class="icon-perfil fas fa-google fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Google</h6>
        	@endif
        	@if($user->provider=='facebook')
				<i class="icon-perfil fas fa-facebook fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Facebook</h6>
        	@endif
        	@if($user->provider=='qoy')
				<i class="icon-perfil fas fa-quora fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Qoy</h6>
        	@endif
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-clock fa-lg"></i>
        	<h6 class="datos-perfil">Se unio {{$user->created_at->diffForHumans()}}</h6>
        </div>
        <div class="datos-row">
                <i class="icon-perfil fas fa-map-marker fa-lg"></i>
                <h6 class="datos-perfil">{{$user->user_ubication ? $user_ubication[$user->user_ubication] : 'No definido'}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-user fa-lg"></i>
        	<h6 class="datos-perfil">{{$user_types[$user->user_type]}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-info fa-lg"></i>
        	<h6 class="datos-perfil">Cuenta {{$user_status[$user->user_state]}}</h6>
        </div><br>
        <div class="datos-row">
            <h6 class="message_h">{{$user_message[$user->user_state]}}</h6>
        </div>
        <br>
        <!-- Post vista admin -->
        @if(auth()->user()->user_type == 5)
            <h6 class="text-primary-yellow">PUBLICACIONES REALIZADAS:</h6><br>
            <h6>Publicado el - Ultima edición - Estado</h6>
            @forelse($posts as $post)
            <div class="datos-row-father">
                <div class="datos-row-category">
                    <h6 class="item-name-fecha"><strong>{{$post->created_at->format('d/m/Y')}}</strong>&nbsp;-</h6>
                    <h6 class="item-name-fecha"><strong>{{$post->updated_at->format('d/m/Y')}}</strong></h6>
                    <h6 class="text-info"><strong>{{$POST_STATE[$post->post_state]}}</strong></h6>
                    @if($post->post_state==4)
                    <a class="delete-item-th" href="{{ route('editar_post', $post->id) }}"><i class="icon-green fas fa-eye fa-lg"></i></a>
                    @else
                    <a class="delete-item-th" href="{{ route('editar_post', $post->id) }}">
                    <i class="icon-green fas fa-eye fa-lg"></i></a>
                    @endif
                </div>
            </div>
            @empty
            <br>
                <h6 class="message_h">Este usuario no realizó ninguna publicación.</h6>
            @endforelse
        @endif
        <!-- Fin post vista admin -->
        <br><br>
	</div>
	<div class="col-sm-4 col-md-4">
	<h6>Insignias de usuario:</h6>
    <div class="logros">
        @forelse($logros as $logro)
            <img class="img-square" src="{{Storage::url('images/logros/'.$logro->achievement_id.'.png')}}" width="60" height="60">
        @empty
        <h6 class="message_h">Este usuario aún no tiene insignias.</h6>
        @endforelse
        <br><br>
    </div><br>
    <!-- solicitudes del usuario admin -->
    @if(auth()->user()->user_type == 5)
    <h6 class="text-primary-yellow">SOLICITUDES ENVIADAS:</h6><br>
    <h6>Articulo - Enviado el - Estado</h6>
        @forelse($requests as $request)
            <div class="datos-row-father">
                <img class="img-square" src="{{Storage::url($request->photo)}}" width="60" height="60">
                <div class="datos-row-items">
                    <h6 class="item-name"><strong>{{$request->thing_name}}</strong></h6>
                    <h6 class="item-description"><strong>{{$request->created_at->format('d/m/Y')}}</strong></h6>
                    <h6 class="text-info"><strong>{{$REQUEST_STATE[$request->request_state]}}</strong></h6>
                    
                    <a class="delete-item-th" href="{{ route('solicitud_eliminada', $request->id) }}"><i class="icon-green fas fa-eye fa-lg"></i></a>
                </div>
            </div>
        @empty
        <br>
            <h6 class="message_h">Este usuario no tiene solicitudes para articulos.</h6>
        @endforelse
    @endif
    <!-- solicitudes del usuario admin -->
    <br><br>

<!-- Admin -->
    @if(auth()->user()->user_type == 5)
        <a type="button" href="{{route('baja_user',[$user->id])}}" class="form-control btn-alert text-a-white text-a-no-hover">&nbsp;Dar de baja</a><br>
        <a type="button" href="{{route('usuarios_qoy')}}" class="form-control btn-primary-yellow text-a-white text-a-no-hover-white">&nbsp;Volver atrás</a><br>
    @else
        <a type="button" href="{{route('editar_perfil')}}" class="form-control btn-primary-yellow text-a-white text-a-no-hover-white">&nbsp;Volver al perfil</a><br>
    @endif
<!-- Fin Admin -->
	</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
</div>

@include('footer.footer')

