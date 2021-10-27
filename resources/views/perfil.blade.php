@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-2 col-md-2"></div>
	<div class="col-sm-4 col-md-4">
		<h5>Perfil</h5>
		<h6 class="message_h">Estos datos son publicos y pueden verlo las personas que entren e tu perfil.</h6>
		<!-- foto y nombre -->
                @if(auth()->user()->user_type==1)
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
	        	<h6 class="datos-perfil">Cuenta de Google</h6>
        	@endif
        	@if(auth()->user()->provider=='facebook')
				<i class="icon-perfil fas fa-facebook fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta de Facebook</h6>
        	@endif
        	@if(auth()->user()->provider=='qoy')
				<i class="icon-perfil fas fa-quora fa-lg"></i>
	        	<h6 class="datos-perfil">Cuenta de Qoy</h6>
        	@endif
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-clock fa-lg"></i>
        	<h6 class="datos-perfil">{{auth()->user()->created_at->format('Y-m-d')}}</h6>
        </div>
        
        <div class="datos-row">
        	<i class="icon-perfil fas fa-map fa-lg"></i>
        	<h6 class="datos-perfil">{{auth()->user()->user_ubication ? 'zona' : 'No definido'}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-map-marker fa-lg"></i>
        	<h6 class="datos-perfil">{{auth()->user()->user_ubication ? 'zona' : 'No definido'}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-history fa-lg"></i>
        	<h6 class="datos-perfil">{{auth()->user()->updated_at->format('Y-m-d')}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-user fa-lg"></i>
        	<h6 class="datos-perfil">{{$user_types[auth()->user()->user_type]}}</h6>
        </div>
        <div class="datos-row">
        	<i class="icon-perfil fas fa-info fa-lg"></i>
        	<h6 class="datos-perfil">Cuenta {{$user_status[auth()->user()->user_state]}}</h6>
        </div><br>
        <h6>Insignias de usuario:</h6>
        <br><br>
		<h6 class="message_h">Este usuario aún no tiene insignias.</h6>
		<br><br>

	</div>
	<div class="col-sm-4 col-md-4">
		
	</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
</div>

@include('footer.footer')

