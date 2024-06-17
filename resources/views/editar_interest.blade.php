@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
	<div class="col-sm-6 col-md-6">
		<h6 class="message_h">Los intereses se basan en nuestras categorias, con las mismas se categorizan las publicaciones, recibiras una notificación cada que se publiquen articulos en las categorias primarias que selecciones.</h6>
		<h6 class="message_h">Tus intereses secundarios salen en <strong class="bg-info">azul</strong> porque no puedes repertirlos como primarios.</h6>
        <br><h6>Edita tus 2 interes primarios:</h6><br>
        <div>
        	@if($interest->isEmpty())
			<h6 class="message_h">No tienes intereses aún.</h6><br>				
        	@else
			@foreach($category as $categoria)
	            	@if($categoria->id == $interest[0]->category_id || $categoria->id == $interest[1]->category_id)
	            		<p id="{{$categoria->id}}" class="interest-item bg-success text-theme">{{$categoria->category_name}}&nbsp;<i onclick="agregarInteres({{$categoria->id}})" id="B{{$categoria->id}}" class="icon-white fas fa-times fa-sm"></i></p>
	            	@else
	            		@if($categoria->id == $interestSec[0]->category_id || $categoria->id == $interestSec[1]->category_id)
	            			<p class="interest-item bg-info text-theme">{{$categoria->category_name}}&nbsp;<i class="icon-white fas fa-check fa-sm"></i></p>
	            		@else
	                	<p id="{{$categoria->id}}" class="interest-item text-theme">{{$categoria->category_name}}&nbsp;<i onclick="agregarInteres({{$categoria->id}})" id="B{{$categoria->id}}" class="icon-yellow fas fa-plus fa-sm"></i></p>
	                	@endif
	                @endif
	            @endforeach

	            <form action="{{ route('editar_intereses_primario') }}" method="post">
	            @csrf
		            <input type="text" hidden="true" name="primario1" id="primario1">
		            <input type="text" hidden="true" name="primario2" id="primario2">
		            <input type="text" hidden="true" name="user" value="{{auth()->user()->id}}">
		            <button type="submit" id="interestButton" disabled="true" class="form-control btn-primary-yellow">Guardar intereses</button><br><br>
	            </form>

			@endif
	        <a type="button" href="{{ route('editar_intereses', [auth()->user()->id,'secundarios']) }}" class="form-control btn-sig btn-primary-yellow text-a-white text-a-no-hover-white">Siguiente</a>
			<a type="button" href="{{route('editar_perfil')}}" class="form-control btn-sig btn-primary-yellow text-a-white text-a-no-hover-white">Cancelar</a>
        </div>
        </div>
	</div>
	<div class="col-sm-3 col-md-3"></div>
</div>

@include('footer.footer')

