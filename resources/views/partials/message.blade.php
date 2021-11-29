@if(session('info'))
<h6>{{session('info')}}</h6>
@endif


@if(auth()->user()->user_state==1)
<div class="mensaje-auxiliar">
	<p><strong>Ya casi terminas de configurar tu perfil.</strong></p>
	<p>Añade tus intereses para recibir una mejor experiencia en Qoy. <a class="text-a-black text-a-no-hover-black" href="{{route('editar_perfil')}}"><strong>Ir al perfil</strong></a></p>
</div>
@endif

@if(auth()->user()->user_state==0)
<div class="mensaje-auxiliar">
	<p><strong>Configura tu perfil.</strong></p>
	<p>Añade tu ubicación para recibir una mejor experiencia en Qoy. <a class="text-a-black text-a-no-hover-black" href="{{route('editar_perfil')}}"><strong>Ir al perfil</strong></a></p>
</div>
@endif
