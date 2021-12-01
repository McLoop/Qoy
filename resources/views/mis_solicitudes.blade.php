@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Estas son todos las solicitudes que realizaste</h6>
        <h6 class="message_h">Se listan todas las solicitudes realizadas por ti, incluidas las incompletas, enviadas, aceptadas, etc.</h6>
        <h6 class="message_h">Si un articulo fue eliminado o ya fue entregado no podras editar la solicitud, pero se seguira mostrando como enviado.</h6>
        <br><br>
        <h6>Articulo - Enviado el - Estado</h6>
        @forelse($requests as $request)
            <div class="datos-row-father">
                <img class="img-square" src="{{Storage::url($request->photo)}}" width="60" height="60">
                <div class="datos-row-items">
                    <h6 class="item-name"><strong>{{$request->thing_name}}</strong></h6>
                    <h6 class="item-description"><strong>{{$request->created_at->format('d/m/Y')}}</strong></h6>
                    <h6 class="text-info"><strong>{{$REQUEST_STATE[$request->request_state]}}</strong></h6>
                    @if($request->thing_state==4 || $request->thing_state==3|| $request->request_state==3 || $request->request_state==4)
                    <a class="delete-item-th" href="{{ route('solicitud_eliminada', $request->id) }}"><i class="icon-green fas fa-chevron-right fa-lg"></i></a>
                    @elseif($request->request_state==2)
                        <a class="delete-item-th" href="{{ route('ver_response', $request->id) }}"><i class="icon-green fas fa-chevron-right fa-lg"></i></a>
                    @else
                    <a class="delete-item-th" href="{{ route('editar_solicitud', $request->id) }}"><i class="icon-yellow fas fa-edit fa-lg"></i></a>
                    @endif

                </div>
            </div>
            @empty
            <br>
                <h6 class="message_h">Aún no tienes articulos en esta publicación.</h6>
            @endforelse
            <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

