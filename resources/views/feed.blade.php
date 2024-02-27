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
				<!-- inicio pruebas
				<section class="main-content" id="posts">
			   			<div class="container">
			                <div class="food-card food-card--vertical">
			                    <div class="food-card_img">
			                        <img src="https://previews.123rf.com/images/alxyzt/alxyzt1710/alxyzt171000281/88223463-hamburger-cartoon-character-icon-kawaii-fast-food-dise%C3%B1o-plano-ilustraci%C3%B3n.jpg" alt="">
			                        <a href="#!"><i class="fa fa-heart"></i></a>
			                    </div>
			                    <div class="food-card_content">
			                        <div class="food-card_title-section">
			                            <a href="#!" class="food-card_title">Double Cheese Potato Burger</a>
			                            <a href="#!" class="food-card_author">Burger</a>
			                        </div>
			                        <div class="food-card_bottom-section">
			                            <div class="space-between">
			                                <div>
			                                    <span class="fa fa-fire"></span> 220 - 280 Kcal
			                                </div>
			                                <div class="pull-right">
			                                    <span class="badge bg-success">Veg</span>
			                                </div>
			                            </div>
			                            <hr>
			                            <div class="space-between">
			                                <div class="food-card_price">
			                                    <span>Boton</span>
			                                </div>
			                                <div class="food-card_order-count">
			                                    <div class="input-group mb-3">
			                                        <div class="input-group-prepend">
			                                            <h6>nombre</h6>
			                                        </div>
			                                        <div class="input-group-append">
			                                            <h6>foto</h6>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			    		</div>

				</section>

				fin pruebas-->
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

