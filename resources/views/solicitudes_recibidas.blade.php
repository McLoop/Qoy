@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Estas son todos las solicitudes que recibiste</h6>
        <h6 class="message_h">Se listan todas las solicitudes que recibieron tus artículos incluidas las rechazadas, aceptadas, etc.</h6>
        <br><br>
        <h6>Articulo - Enviado el - Estado</h6>
        @forelse($requests as $request)
            <div class="datos-row-father">
                <img class="img-square" src="{{Storage::url($request->photo)}}" width="60" height="60">
                <div class="datos-row-items">
                    <h6 class="item-name"><strong>{{$request->thing_name}}</strong></h6>
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
                <h6 class="message_h">Aún no tienes articulos en esta publicación.</h6>
            @endforelse
            <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

