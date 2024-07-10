@include('head.head')
<div class="container-content-page container-back">
@include('partials.message')
    <div class="row">
    	<div class="col-sm-3 col-md-3"></div>
        <div class="col-sm-6 col-md-6">
            <h5>Cuenta de empresas en Qoy</h5>
            <br>
            <h6 align="justify">¿Por que cambiar a cuenta de empresa?</h6>
            <p align="justify">Dentro de Qoy las cuentas empresariales obtienen distintos beneficios y la posibilidad de llegar a mas personas por medio del feed, dichos beneficios no estas disponibles para los usuarios regulares.</p>
            <br>
            <h6 align="justify">¿Que beneficios tiene una cuenta de empresa?</h6>
            <p align="justify">Los beneficios de las cuentas empresariales estan disponibles para todas las publicaciones, categorias y usuarios de Qoy, siendo las mismas:</p><br>
                <ul>
                  <li><h6>Posicionamiento dentro del feed</h6></li>
                  <li>Las publicaciones realizadas por una cuenta de empresa apareceran en un lugar preferencial por sobre otras publicaciones, apareciendo primero en el feed de los usuarios que tengan dicha categoria en sus intereses primarios o secundarios</li>
                  <li><h6>Mejora en las solicitudes</h6></li>
                  <li>Las solicitudes realizadas por una cuenta de empresa apareceran primero para el usuario propiertario de la publicación, recibiendo asi mas probabilidades de adquirir el objeto solicitado.</li>
                  <li><h6>Seguridad entre los usuarios</h6></li>
                  <li>Qoy brinda mayor respaldo a las cuentas de empresa, siendo categorizadas como "Aprobado por Qoy", reflejando así mayor confianza entre los usuarios.</li>
                </ul>
            <br><br>    
            <p align="justify">Para cambiar a una cuenta empresarial, debes solicitarla a un administrador, quien evaluara el perfil en cuestion y se comunicara a tu número de referencia para consultar sobre la solicitud y gestionar un plan de pagos si es necesario.</p><br>
            <p align="justify">Qoy no se hace responsable del mal uso que puede ser ejecutado por los operarios de la empresa que tienen acceso al perfil empresarial, para mas información leer las Q&A de Qoy</p><br>

                <a type="button" href="{{ route('editar_usuario', [auth()->user()->id,'solicitud']) }}" class="form-control btn-primary-yellow text-a-no-hover-black">&nbsp;Solicitar cambio</a>
                <p>Al solicitar el cambio usted acepta nuestros <a href="{{route('terminos')}}">Términos y condiciones.</a></p><br>

        </div>
        <div class="col-sm-3 col-md-3"></div>
    </div>
</div>

@include('footer.footer')

