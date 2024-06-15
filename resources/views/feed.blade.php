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
			<!-- Inicio publicaciones interes primario 1-->
					@include('feed_pagination')
			<!-- fin publicaciones  -->
			
		</div>
		<div class="col-sm-3 col-md-3"></div>
	</div>
	<br><br>
</div>

<!-- Javascript para carga dinamica del feed -->
<script>
	//Capturamos si el usuario llego al final de la pagina del feed
	//Comparamos la altura del contenido de la ventana con la altura del elemento body
	let pagina=2;
		window.onscroll = () =>{
			if((window.innerHeight + window.pageYOffset)+1 >= document.getElementById('contenido-feed').offsetHeight){
				//Llegamos al final
				const posts = document.getElementById("posts")
				//Pedimos al servidor
				fetch('/pagination/'+pagina,{
					method: 'get'
				})
				.then(response => response.text())
				.then(htmlContent => {
					//respuesta del servidor en HTML
					console.log(pagina);
					if(pagina>=5)
					{
					}else{
						console.log('cargando html')
						posts.innerHTML += htmlContent;
						pagina += 1;
					}
				})
				.catch(err => console.log(err));
			}
		};
	
</script>
<!-- fin codigo Javascript-->


@include('footer.footer')

