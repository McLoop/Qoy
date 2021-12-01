@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Solicitud aceptada</h6>
        <h6 class="message_h">Recuerda leer los <a href="{{route('terminos')}}">terminos y condiciones</a> antes de realizar un encuentro.</h6>
            @forelse($response as $respon)
           <div class="datos-row">
                <h6 class="titulo-yellow">Mensaje:</h6>&nbsp;
            </div>
            <h5>{{$respon->message}}</h5><br>
            
            @empty
            @endforelse
            <p class="divider">.</p><br>
            @forelse($users as $user)
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
        @if(isset($user->user_ci))
            <div class="datos-row">
                <i class="icon-perfil fas fa-info fa-lg"></i>
                <h6 class="datos-perfil">{{$user->user_ci ? $user->user_ci : 'No definido'}}</h6>
            </div>
        @else
            <h6 class="message_h">Este usuario no proporcio su ci.</h6>
        @endif

        @if(isset($user->user_phone))
            <div class="datos-row">
                <i class="icon-perfil fas fa-info fa-lg"></i>
                <h6 class="datos-perfil">{{$user->user_phone ? $user->user_phone : 'No definido'}}</h6>
            </div>
        @else
            <h6 class="message_h">Este usuario no proporcio su teléfono.</h6>
        @endif

        @if(isset($user->user_dir))
            <div class="datos-row">
                <i class="icon-perfil fas fa-info fa-lg"></i>
                <h6 class="datos-perfil">{{$user->user_dir ? $user->user_dir : 'No definido'}}</h6>
            </div>
        @else
            <h6 class="message_h">Este usuario no proporcio su dirección.</h6>
        @endif
            @empty
            @endforelse
        <br>
        <a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('solicitudes_enviadas') }}">Aceptar</a>
        <br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

