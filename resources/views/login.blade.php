@include('head.headsimple')
<div class="container-content-page container-back">
	
	<div class="row">
		<div class="col-sm-4 col-md-4"></div>
		<div class="col-sm-4 col-md-4">
			<h4 class="text-theme"><strong>Iniciar Sesión en Qoy</strong></h4>
			<br>
			@include('partials.message')
			<br>
			<form method="post" action="{{ route('login_qoy')}}">
			@csrf
			<label for="mail" class="text-label-left text-theme">Correo Electronico</label>
			<input type="text" name="usuario" id="mail" autocomplete="off" class="input-line-yellow form-control">
			<label for="pwd"  class="text-label-left text-theme">Contraseña</label>
			<input type="password" name="password" id="pwd" autocomplete="off" class="input-line-yellow form-control">
			<input type="checkbox" name="recordar" class="check-yellow" id="chbx">
			<label for="chbx" class="text-theme">Mantener Sesión iniciada</label>
			<button type="submit" class="form-control btn-primary-yellow">Entrar</button>
			</form>
			<p class="text-center lead">- o -</p>
            <a type="button" class="form-control btn-google-form text-a-black text-a-no-hover-black" href="{{ url('/auth/redirect/google') }}"><i class="text-red fas fa-google fa-1x"></i>&nbsp;&nbsp;&nbsp;Iniciar sesión con Google</a>
            <a type="button" class="form-control btn-facebook-form text-a-white text-a-no-hover-white" href="{{ url('/auth/redirect/facebook') }}"><i class="fas fa-facebook fa-1x"></i>&nbsp;Iniciar sesión con Facebook</a><br>
            <p class="text-theme">¿Aún no tienes una cuenta?</p><a href="{{ route('register')}}">Registrate Ahora</a>
            <p class="p-bottom"></p>
		</div>
		<div class="col-sm-4 col-md-4"></div>
	</div>

	
</div>
@include('footer.footer')

