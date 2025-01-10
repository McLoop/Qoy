@include('head.head')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<h5 class="text-theme-yellow">Ultimas publicaciones realizadas</h5><br>
			<table class="table table-striped">
				<thead>
					<th>Articulo</th>
					<th>Estado Art.</th>
					<th>Ubicacion</th>
					<th>Categoria</th>
					<th>Usuario</th>
					<th>Fecha publicación</th>
					<th>Fecha ult. cambio</th>
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
					<td>{{ $thing->updated_at->diffForHumans() }}</td>
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

