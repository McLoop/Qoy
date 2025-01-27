@include('head.head')
@include('partials.message')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-6 col-md-6">
			<h6>Añadir artículo</h6>
			<h6 class="message_h">Este artículo sera añadido a tu publicacion actual.</h6><br>
			<form method="post" action="{{route('agregar_articulo')}}" enctype="multipart/form-data" autocomplete="off">
			@csrf
			<input type="text" hidden="true" value="{{$idPost}}" name="idPost">

			<div class="datos-row"> 
			<label for="nom" class="text-label-left text-theme">Nombre del artículo</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Debes rellenar este campo con el nombre del objeto de manera literal.">aa</span></i>
			</div>
			<input type="text" name="nombre" id="nom" autocomplete="off" class="input-line-yellow form-control" placeholder="Mesa de Jardín">
			@error('nombre')
				<small><strong>{{ $message }}</strong></small>
			@enderror

			<div class="datos-row"> 
			<label for="des" class="text-label-left text-theme">Descripción</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Agrega una pequeña descripción acerca de este artículo.">aa</span></i>
			</div>
			<input type="text" name="descripcion" id="des" autocomplete="off" class="input-line-yellow form-control" placeholder="Pequeña mesa de jardin de madera">
			@error('descripcion')
				<small><strong>{{ $message }}</strong></small>
			@enderror
			<div class="datos-row"> 
			<label for="foto" class="text-label-left text-theme">Foto del artículo</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Agrega una foto real del articulo, si subes una foto que no corresponde te arriesgas a ser denunciado y perder tu perfil.">aa</span></i>
			</div>
			<!-- foto -->
			<div id="inputFoto">
            <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->avatar) ? Storage::url("images/avatar/$data->avatar") : ''}}" accept="image/*"/>
            @error('foto_up')
				<small><strong>{{ $message }}</strong></small>
			@enderror
			</div>
			<!-- foto -->

			<div class="datos-row"> 
			<label for="est" class="text-label-left text-theme">Estado del artículo</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="Es el estado en el que se encuentra, usado, nuevo, desgastado, etc.">aa</span></i>
			</div>
			<div class="select-qoy">
                    <select id="est" name="estado">
                      <option value="0">Nuevo</option>
                      <option value="1">En buen estado</option>
                      <option value="2">Usado</option>
                      <option value="3">Un poco desgastado</option>
                      <option value="4">Desgastado</option>
                      <option value="5">En mal estado</option>
                      <option value="6" selected>Regular</option>

                    </select>
                </div>

            <div class="datos-row"> 
			<label for="ubi" class="text-label-left text-theme">Ubicación</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="La ubicación donde se encuentra el artículo, se toma por defecto la ubicación donde resides.">aa</span></i>
			</div>
			<input type="text" name="ubicacion" id="ubi" autocomplete="off" class="input-line-yellow form-control" disabled value="{{auth()->user()->user_ubication}}">

			<div class="datos-row"> 
			<label for="cat" class="text-label-left text-theme">Categoria</label><i class="icon-information fas fa-question-circle fa-lg"><span class="tooltip" title="La categoria a la pertenece tu artículo.">aa</span></i>
			</div>
				<div class="select-qoy">
                    <select id="cat" name="categoria">
                      @forelse($category as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->category_name}}</option>
                      @empty
                      <option value="0">No hay regiones para mostrar</option>
                      @endforelse
                    </select>
                </div>
			
			<p class="text-theme">Al registrarte aceptas nuestros <a href="">terminos y condiciones.</a></p>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<a type="button" class="form-control btn-add btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('editar_post',$idPost) }}">Cancelar</a>
				</div>
				<div class="col-sm-6 col-md-6">
					<button type="submit" class="form-control btn-add btn-primary-yellow">Agregar artículo</button>
				</div>
			</div>
			</form>
		</div>
			
		<div class="col-sm-3 col-md-3"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

