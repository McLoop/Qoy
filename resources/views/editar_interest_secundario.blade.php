@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
	<div class="col-sm-6 col-md-6">
		<h5></h5>

		<h6 class="message_h">Los intereses se basan en nuestras categorias, con las mismas se categorizan las publicaciones, recibiras una notificación cada que se publiquen articulos en las categorias primarias que selecciones.</h6>
		<br><h6>Edita tus 2 intereses secundarios:</h6><br>
		
        <div>
            @foreach($category as $categoria)
            	@if($categoria->id == $interest[0]->category_id || $categoria->id == $interest[1]->category_id)
            		
            	@elseif($categoria->id == $interestSec[0]->category_id || $categoria->id == $interestSec[1]->category_id)
            		<p id="{{$categoria->id}}" class="interest-item bg-success text-theme">{{$categoria->category_name}}&nbsp;<i onclick="agregarInteres({{$categoria->id}})" id="B{{$categoria->id}}" class="icon-white fas fa-times fa-sm"></i></p>
            	@else
                	<p id="{{$categoria->id}}" class="interest-item text-theme">{{$categoria->category_name}}&nbsp;<i onclick="agregarInteres({{$categoria->id}})" id="B{{$categoria->id}}" class="icon-yellow fas fa-plus fa-sm"></i></p>
                @endif
            @endforeach

            <form action="{{ route('editar_intereses_secundario') }}" method="post">
            @csrf
	            <input type="text" hidden="true" name="secundario1" id="primario1">
	            <input type="text" hidden="true" name="secundario2" id="primario2">
	            <input type="text" hidden="true" name="user" value="{{auth()->user()->id}}">
	            <button type="submit" id="interestButton" disabled="true" class="form-control btn-primary-yellow">Guardar intereses</button><br><br>
            </form>
        </div>
	</div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

