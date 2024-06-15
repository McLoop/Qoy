@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
	<div class="col-sm-6 col-md-6">
		<h5></h5>

		<h6 class="message_h">Los intereses se basan en nuestras categorias, con las mismas se categorizan las publicaciones, recibiras una notificación cada que se publiquen articulos en las categorias primarias que selecciones.</h6>
		<br><h6>Selecciona 2 interes primarios:</h6><br>
		
        <div>
            @foreach($category as $categoria)
                <p id="{{$categoria->id}}" class="interest-item text-theme">{{$categoria->category_name}}&nbsp;<i onclick="agregarInteres({{$categoria->id}})" id="B{{$categoria->id}}" class="icon-yellow fas fa-plus fa-sm"></i></p>
            @endforeach

            <form action="{{ route('guardar_intereses_primario') }}" method="post">
            @csrf
	            <input type="text" hidden="true" name="primario1" id="primario1">
	            <input type="text" hidden="true" name="primario2" id="primario2">
	            <input type="text" hidden="true" name="user" value="{{auth()->user()->id}}">
	            <button type="submit" id="interestButton" disabled="true" class="form-control btn-primary-yellow">Guardar intereses</button><br><br>
            </form>

	</div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

