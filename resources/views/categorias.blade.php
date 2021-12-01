@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Estas son todas las categorias que tenemos para ti!</h6>
        <h6 class="message_h">Intentamos agregar categorias lo mas frecuente posible, todo para brindarte una mejor experiencia.</h6>
        <br><br>
        @forelse($category as $categoria)
            <div class="datos-row-father">
                <div class="datos-row-category">
                    <h6 class="item-name"><strong>{{$categoria->category_name}}</strong></h6>
                    <a class="delete-item-th" href="{{ route('mostrar_categoria', $categoria->id) }}"><i class="icon-green fas fa-chevron-right fa-lg"></i></a>
                </div>
            </div>
            @empty
            <br>
                <h6 class="message_h">Aún no tienes articulos en esta publicación.</h6>
            @endforelse
            <br><br>
    </div>
	<div class="col-sm-3 col-md-3"></div>
</div>
</div>

@include('footer.footer')

