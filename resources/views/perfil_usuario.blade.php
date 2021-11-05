@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-2 col-md-2"></div>
	<div class="col-sm-4 col-md-4">
		<h5>Perfil de usuario</h5>
		<!-- foto y nombre -->
                @if(auth()->user()->provider=='qoy')
                <img class="img-circle" src="{{Storage::url(auth()->user()->avatar)}}" alt="" width="120" height="120">
                @else
                <img class="img-circle" src="{{auth()->user()->avatar}}" alt="" width="120" height="120">
                @endif
		
        <a class="text-theme perfil-nombre" href="#">{{auth()->user()->name}}</a>
        <!-- Datos -->
        <div class="datos-row">
        	<i class="icon-perfil fas fa-envelope fa-lg"></i>
        	<h6 class="datos-perfil">{{auth()->user()->email}}</h6>
        </div>
        <div class="datos-row">
        	@if(auth()->user()->provider=='google')
				<i class="icon-perfil fas fa-google fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Google</h6>
        	@endif
        	@if(auth()->user()->provider=='facebook')
				<i class="icon-perfil fas fa-facebook fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Facebook</h6>
        	@endif
        	@if(auth()->user()->provider=='qoy')
				<i class="icon-perfil fas fa-quora fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta proporcionada por Qoy</h6>
        	@endif
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-clock fa-lg"></i>
        	<h6 class="datos-perfil">Se unio {{auth()->user()->created_at->diffForHumans()}}</h6>
        </div>
        <div class="datos-row">
                <i class="icon-perfil fas fa-map-marker fa-lg"></i>
                <h6 class="datos-perfil">{{auth()->user()->user_ubication ? $user_ubication[auth()->user()->user_ubication] : 'No definido'}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-user fa-lg"></i>
        	<h6 class="datos-perfil">{{$user_types[auth()->user()->user_type]}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-info fa-lg"></i>
        	<h6 class="datos-perfil">Cuenta {{$user_status[auth()->user()->user_state]}}</h6>
        </div>
        <div class="datos-row">
            <h6 class="message_h">{{$user_message[auth()->user()->user_state]}}</h6>
        </div>
        <br>
        
	</div>
	<div class="col-sm-4 col-md-4">
	<h6>Insignias de usuario:</h6>
        <br><br>
                <h6 class="message_h">Este usuario aún no tiene insignias.</h6>
                <br><br>

	</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
</div>

@include('footer.footer')

