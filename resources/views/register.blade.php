@include('head.headsimple')
<div class="container-content-page container-back">
	
	<div class="row">
		<div class="col-sm-4 col-md-4"></div>
		<div class="col-sm-4 col-md-4">
			<h4 class="text-theme"><strong>Registrate en Qoy</strong></h4>
			<br><br>
			<form method="post" action="">
			<label for="nom" class="text-label-left text-theme">Nombre Completo</label>	
			<input type="text" name="nombre" id="nom" autocomplete="off" class="input-line-yellow form-control">
			<label for="mail" class="text-label-left text-theme">Correo Electronico</label>
			<input type="text" name="correo" id="mail" autocomplete="off" class="input-line-yellow form-control">
			<input type="hidden" name="provider" value="qoy">
			<!-- avatar -->
			
			<!-- avatar -->
			<label for="pwd"  class="text-label-left text-theme">Contraseña</label>
			<input type="password" name="password" id="pwd" autocomplete="off" class="input-line-yellow form-control">
			<p class="text-theme">Al registrarte aceptas nuestros <a href="">terminos y condiciones.</a></p>
			<button type="submit" class="form-control btn-primary-yellow">Registrarse</button>
			</form>
			<p class="text-center lead">- o -</p>
            <a type="button" class="form-control btn-google-form text-a-black text-a-no-hover-black" href="{{ url('/auth/redirect/google') }}"><i class="text-red fas fa-google fa-1x"></i>&nbsp;&nbsp;&nbsp;Registrarse con Google</a>
            <a type="button" class="form-control btn-facebook-form text-a-white text-a-no-hover-white" href="#"><i class="fas fa-facebook fa-1x"></i>&nbsp;Registrarse con Facebook</a><br>
            <p class="text-theme">¿Aún no tienes una cuenta?</p><a href="{{ route('register')}}">Registrate Ahora</a>
            <p class="p-bottom"></p>
		</div>
		<div class="col-sm-4 col-md-4"></div>
	</div>

	
</div>
@include('footer.footer')

