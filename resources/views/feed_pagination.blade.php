<!-- Inicio publicaciones -->
@forelse($things as $thing)
<div class="container">
	<div class="food-card food-card--vertical">
		<div class="food-card_img">
			<img src="{{isset($thing->photo) ? Storage::url("$thing->photo") : Storage::url("images/articulos/defaultArticulo.jpg")}}" alt="">
			 @if($thing->user_id == auth()->user()->id)
	        
		     @else
		     <a href="{{ route('nueva_solicitud', [$thing->thing_id, $thing->thing_name]) }}"><i class="fa fa-plus"></i></a>
		     @endif
		</div>
	<div class="food-card_content">
		<div class="food-card_title-section">
			<a href="{{ route('ver_articulo', $thing->thing_id) }}" class="food-card_title">{{ $thing->thing_name }}</a>
				<div class="perfil-foto-nombre">
					@if($thing->provider=='qoy')
						<img class="img-circle-post" src="{{Storage::url($thing->avatar)}}" width="15" height="15">
					@else
						<img class="img-circle-post" src="{{$thing->avatar}}" width="15" height="15">
					@endif
					<a href="{{ route('user_perfil', $thing->user_id) }}">{{$thing->name}}</a>
				</div>
		</div>
		<div class="food-card_bottom-section">
			<a href="#!" class="food-card_author"><span class="hora-pub"><i class="icon-yellow fas fa-clock fa-sm"></i> {{ $thing->updated_at->diffForHumans() }}</span></a>
			<div class="space-between">
			    <div>
			        <span class="fa fa-fire"></span> {{ $thing->description }}
			    </div>

			</div>
			<hr>
				<div class="space-between">
					<div class="food-card_price">
						<a class="" href="{{ route('ver_articulo', $thing->thing_id) }}"><h6 class="text-primary-yellow">Detalles</h6></a>
					</div>&nbsp;&nbsp;
					<div class="pull-right">
					    <span class="badge bg-info">{{ $thing_status[$thing->status] }}</span>
					</div>&nbsp;
					<div class="pull-right">
					    <span class="badge bg-success">{{ $thing_state[$thing->thing_state] }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@empty
	<h6 class="message_h"></h6><br>
@endforelse
<!-- Fin publicaciones -->