@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Respuesta a solicitud para un artículo</h6>
        <h6 class="message_h">Recuerda que el solicitante vera tus datos para su seguridad al momento de realizar un encuentro, recuerda leer los terminos y condiciones antes de realizar un encuentro.</h6>
        <form action="{{ route('agregar_solicitud_response') }}" method="post">
            @csrf
            <input hidden="true" type="text" name="idRequest" value="{{$idRequest}}">
            <input hidden="true" type="text" name="user_id" value="{{auth()->user()->id}}">
            <div class="datos-row">
                <i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="En este mensaje puedes mandar instrucciónes o formas de contactarte para programar un encuentro.">aa</span></i>
                <h6 class="titulo-yellow">Mensaje:</h6>&nbsp;
            </div>
            <input type="text" name="mensaje" id="men" autocomplete="off" class="input-line-yellow form-control" placeholder="Mensaje corto o una formas de contactarte"><br>
            <button type="submit" class="form-control btn-primary-yellow">Enviar</button>
        </form>
        <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

