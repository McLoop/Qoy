@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Solicitud de un usuario</h6>
        <h6 class="message_h">Recuerda elegir bien a la persona que daras tus objetos.</h6>
            @forelse($requests as $request)
            <div class="datos-row">
                <h6 class="titulo-yellow">Usuario:</h6>&nbsp;
            </div>
            <div class="perfil-foto-nombre">
                <a class="text-theme a-grande" href="{{ route('user_perfil', $request->usrId) }}">{{$request->name}}</a>
            </div>
            <div class="datos-row">
                <h6 class="titulo-yellow">Mensaje:</h6>&nbsp;
            </div>
            <h6>{{$request->message}}</h6>
            <div class="datos-row">
                <h6 class="titulo-yellow">Interes:</h6>&nbsp;
            </div>
            <div>
            <span id="rangeValue">Regular</span>
            <Input class="range" type="range" disabled name="interes" value="{{$request->degree_interest}}" min="0" max="4" onchange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
            </div>
            @empty
            @endforelse
            <div class="row">
            <div class="col-sm-6 col-md-6">
                <a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{route('aceptar_solicitud', $request->id)}}">Aceptar</a>
            </div>
            <div class="col-sm-6 col-md-6">
                <a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{route('denegar_solicitud', $request->id)}}">Denegar</a>
            </div>
            </div>
        <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

