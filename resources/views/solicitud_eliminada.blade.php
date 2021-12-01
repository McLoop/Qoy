@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Solicitud para un artículo</h6>
        <h6 class="message_h">Recuerda que el propietario del artículo será el unico que leera tu solicitud y tomara una decisión.</h6>
            @forelse($requests as $request)
            <div class="datos-row">
                <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Escribe un mensaje corto explicando el porque quieres poseer este objeto.">aa</span></i>
                <h6 class="titulo-yellow">Mensaje:</h6>&nbsp;
            </div>
            <input type="text" name="mensaje" readonly id="men" autocomplete="off" class="input-line-yellow form-control" value="{{$request->message}}" placeholder="Mensaje corto o una razón principal"><br>
            <div class="datos-row">
                <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Coloca sinceramente cuan interesado estas en este artículo.">aa</span></i>
                <h6 class="titulo-yellow">Interes:</h6>&nbsp;
            </div>
            <div>
            <span id="rangeValue">Regular</span>
            <Input class="range" type="range" disabled name="interes" value="{{$request->degree_interest}}" min="0" max="4" onchange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
            </div>
            @empty
            @endforelse
        <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

