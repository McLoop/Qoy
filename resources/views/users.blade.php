@include('head.head')
<div class="container-content-page container-back">
	<div class="row">
		<div class="col-sm-1 col-md-1"></div>
		<div class="col-sm-10 col-md-10">
			@if($flag)
				<h5 class="text-theme-yellow">Solicitudes para cambio de cuenta a Empresa</h5><br>
				<h6 class="message_h">Estos usuarios quieren cambiar a una cuenta Empresarial, asegurate de revisar sus perfiles antes de aprobar una solicitud.</h6><br>
			@else
				<h5 class="text-theme-yellow">Usuarios registrados en QOY.</h5><br>
				<h6 class="message_h">Se muestran todos los usuarios registrados.</h6><br>
			@endif
			<table class="table table-striped table-bordered">
				<thead>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Proveedor</th>
					<th>Correo</th>
					<th>Registro</th>
					<th>Ubicación</th>
					<th>Tipo</th>
					<th>Cuenta</th>
					<th></th>
					@if($flag)
					<th></th>
					@endif
				</thead>
				<tbody>
				@forelse($users as $user)
				<tr>
					<td>
						@if($user->provider=='qoy')
                      		<img class="img-circle-post" src="{{Storage::url($user->avatar)}}" width="20" height="20">
	                    @else
	                      	<img class="img-circle-post" src="{{$user->avatar}}" width="15" height="15">
	                    @endif
					</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->provider }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
					@if(is_null($user->user_ubication))
						<td>No definido</td>
					@else
						<td>{{ $ubication[$user->user_ubication] }}</td>
					@endif
					<td>{{ $user_types[$user->user_type] }}</td>
					<td>{{ $user_status[$user->user_state] }}</td>
					@if($flag)
					<td><a class="text-a-no-hover btn-primary-yellow-sm" href="{{ route('user_perfil', $user->id) }}">Ver</a></td>
					<td><a class="text-a-no-hover text-a-white btn-alert-sm" href="{{ route('editar_usuario', [$user->id,'cambioEmpresa']) }}">Aprobar</a></td>
					@else
					<td><a class="text-a-no-hover btn-primary-yellow-sm" href="{{ route('user_perfil', $user->id) }}">Ver</a></td>
					@endif
				</tr>
				@empty
				<h6 class="message_h">Nada que mostrar.</h6>
				@endforelse
				
				</tbody>
			</table>
			<div class="">
				{!! $users->links() !!}
			</div>
		</div>
		<div class="col-sm-1 col-md-1"></div>
	</div>
	

	<br><br>
</div>

@include('footer.footer')

