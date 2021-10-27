@include('head.headsimple')
<div class="container-content-page container-back">
	
	<div class="row">
		<div class="col-sm-4 col-md-4"></div>
		<div class="col-sm-4 col-md-4">
			<h4 class="text-theme"><strong>Registrate en Qoy</strong></h4>
			<br><br>
			<form method="post" action="{{route('usuario_register')}}" enctype="multipart/form-data" autocomplete="off">
			@csrf
			<label for="nom" class="text-label-left text-theme">Nombre Completo</label>	
			<input type="text" name="nombre" id="nom" autocomplete="off" class="input-line-yellow form-control" placeholder="Nombres Paterno Materno">
			<label for="mail" class="text-label-left text-theme">Correo Electronico</label>
			<input type="text" name="correo" id="mail" autocomplete="off" class="input-line-yellow form-control" placeholder="correoelectronico@correo.com">
			<input type="hidden" name="provider" value="qoy">
			<input type="hidden" name="provider_id" value="0000000">
			<!-- avatar -->
			<div id="inputFoto">
            <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->avatar) ? Storage::url("images/avatar/$data->avatar") : Storage::url("images/avatar/defaultPreview.jpg")}}" accept="image/*"/>
			</div>
			<input type="checkbox" class="check-yellow" name="fotoDefault" id="checkboxFoto" class="checkbox-primary" onclick="fotoFunctionJS()">
			<label class="text-theme" for="checkboxFoto">Usar avatar por default</label>

			<!-- avatar -->
			<label for="pwd" class="text-label-left text-theme">Contraseña</label>
			<input type="password" name="password" id="pwd" autocomplete="off" class="input-line-yellow form-control">
			<p class="text-theme">Al registrarte aceptas nuestros <a href="">terminos y condiciones.</a></p>
			<button type="submit" class="form-control btn-primary-yellow">Registrarse</button>
			</form>
			<p class="text-center lead">- o -</p>
            <a type="button" class="form-control btn-google-form text-a-black text-a-no-hover-black" href="{{ url('/auth/redirect/google') }}"><i class="text-red fas fa-google fa-1x"></i>&nbsp;&nbsp;&nbsp;Registrarse con Google</a>
            <a type="button" class="form-control btn-facebook-form text-a-white text-a-no-hover-white" href="{{ url('/auth/redirect/facebook') }}"><i class="fas fa-facebook fa-1x"></i>&nbsp;Registrarse con Facebook</a><br>
            <p class="text-theme">¿Ya tienes una cuenta?</p><a href="{{ route('register')}}">Ingresa Aqui</a>
            <p class="p-bottom"></p>
		</div>
		<div class="col-sm-4 col-md-4"></div>
	</div>

	
</div>
@include('footer.footer')


