@include('head.head')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<h5 class="text-theme-yellow">Últimas publicaciónes realizadas.</h5><br>
			<table class="table table-striped table-bordered">
				<thead>
					<th>Artículo</th>
					<th>Estado Art.</th>
					<th>Ubicación</th>
					<th>Categoría</th>
					<th>Usuario</th>
					<th>Fecha publicación</th>
					<th></th>
				</thead>
				<tbody>
				@forelse($things as $thing)
				<tr>
					<td>{{ $thing->thing_name }}</td>
					<td>{{ $thing_state[$thing->thing_state] }}</td>
					<td>{{ $ubication[$thing->ubication] }}</td>
					<td>{{ $category_list[$thing->category_id] }}</td>
					<td><a class="text-theme" href="{{ route('user_perfil', $thing->user_id) }}">{{$thing->name}}</a></td>
					<td>{{ $thing->created_at->diffForHumans() }}</td>
					<td><a class="text-a-no-hover btn-primary-yellow-sm" href="{{ route('ver_articulo', $thing->thing_id) }}">Ver</a></td>
				</tr>
				@empty
				@endforelse
				<tr>
					
				</tr>
				</tbody>
			</table>
			<div class="">
				{!! $things->links() !!}
			</div>
		</div>
		<div class="col-sm-2 col-md-2"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

