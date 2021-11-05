<?php

namespace App\Http\Controllers;
class Lista {

	const USER_TYPES = array(
		0=>'Invitado',
		1=>'Nuevo Usuario',
        2=>'Usuario Recurrente'
	);

	const USER_TYPES_MESSAGE = array(
		0=>'Todos los nuevos usuarios son invitados hasta que completan su perfil añadiendo una ubicación.',
		1=>'Seras NUEVO USUARIO hasta que compartas tu primera publicación o solicites propiedad de algun objeto.',
        2=>'USUARIO RECURRENTE significa que eres un usuario que comparte y solicita con frecuencia dentro de Qoy, esto significa algo bueno para los demas usuarios que visiten tu perfil.'
	);

	const USER_STATUS = array(
		0=>'Incompleta', // Usuario sin perfil terminado
		1=>'Activa',     // Usuario con perfil terminado
        2=>'Inactiva',   // Eliminacion logica de usuario
        3=>'Seguro',	 // Usuario con datos personales
        4=>'Inhabilitado'// Usuario inhabilitado por faltas
	);

	const USER_MESSAGE = array(
		0=>'Esta cuenta esta recien creada, el perfil no termino de configurarse correctamente.', // Usuario sin perfil terminado
		1=>'Esta cuenta esta actualmente activa, puede publicar y solicitar propiedad en Qoy.',     // Usuario con perfil terminado
        2=>'Esta cuenta esta actualmente inactiva por peticion del usuario.',   // Eliminacion logica de usuario
        3=>'Este cuenta fue deshabilitada por ir en contra de los terminos y condiciones de Qoy.'		 // Usuario con datos personales
	);

	const REGION = array(
		1=>'Arani',
        2=>'Tarata'
	);

	const ZONA = array(
		1=>'Central',
		2=>'Norte',
        3=>'Sud'
	);

	const UBICATION = array(
		1=>'Arani Zona Central',
		2=>'Arani Zona Norte',
        3=>'Arani Zona Sur'
	);

}
