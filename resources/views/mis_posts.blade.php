@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
<div class="row">
	<div class="col-sm-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
        <h6>Estas son todos las publicaciones que realizaste</h6>
        <h6 class="message_h">Se listan todas las publicaciones realizadas por ti, incluidas las incompletas, entregadas, etc.</h6>
        <br><br>
        <h6>Publicado el - Ultima edición - Estado</h6>
        @forelse($posts as $post)
            <div class="datos-row-father">
                <div class="datos-row-category">
                    <h6 class="item-name-fecha"><strong>{{$post->created_at->format('d/m/Y')}}</strong>&nbsp;-</h6>
                    <h6 class="item-name-fecha"><strong>{{$post->updated_at->format('d/m/Y')}}</strong></h6>
                    <h6 class="text-info"><strong>{{$POST_STATE[$post->post_state]}}</strong></h6>
                    @if($post->post_state==4)
                    <a class="delete-item-th" href="{{ route('editar_post', $post->id) }}"><i class="icon-green fas fa-chevron-right fa-lg"></i></a>
                    @else
                    <a class="delete-item-th" href="{{ route('editar_post', $post->id) }}">
                    <i class="icon-yellow fas fa-edit fa-lg"></i></a>
                    @endif
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

