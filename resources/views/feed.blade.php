@include('head.head')
@include('partials.message')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-6 col-md-6">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<h6 class="titulo-pub">¿Tienes algo que dar? Publicalo ahora!</h6>
				</div>
				<div class="col-sm-6 col-md-6 center-con">
					<a type="button" class="form-control btn-pub btn-primary-yellow text-a-white text-a-no-hover-white" href="{{ route('nuevo_post') }}">Publicar</a>
				</div> 
			</div><br>

			<!-- Inicio publicaciones interes primario -->
			
			<!-- Fin publicaciones interes primario -->

			<!-- Inicio publicaciones interes Secundario -->
			
			<!-- Fin publicaciones interes Secundario -->

			<!-- Inicio publicaciones cercanas -->

			<!-- Fin publicaciones cercanas -->

			<!-- Inicio publicaciones -->

			<!-- Inicio publicaciones  -->

		</div>
		<div class="col-sm-3 col-md-3"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

