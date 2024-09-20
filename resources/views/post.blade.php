@include('head.head')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<table class="table table-striped">
				<thead>
					<th>Articulo</th>
					<th>Estado Art.</th>
					<th>Ubicacion</th>
					<th>Categoria</th>
					<th>Usuario</th>
				</thead>
				<tbody>
				@forelse($things as $thing)
				<tr>
					<td>{{ $thing->thing_name }}</td>
					<td>{{ $thing_state[$thing->thing_state] }}</td>
					<td>{{ $ubication[$thing->ubication] }}</td>
					<td>{{ $category_list[$thing->category_id] }}</td>
					<td><a class="text-theme" href="{{ route('user_perfil', $thing->user_id) }}">{{$thing->name}}</a></td>
				</tr>
				@empty
				@endforelse
				</tbody>
			</table>
			<div class="pagination-wrapper">
				{!! $things->links() !!}
			</div>
		</div>
		<div class="col-sm-2 col-md-2"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

