<?php

namespace App\Http\Controllers;
class Lista {

	const USER_TYPES = array(
		0=>'Invitado',
		1=>'Nuevo Usuario',
        2=>'Usuario Recurrente'
	);

	const USER_STATUS = array(
		0=>'Incompleta',
		1=>'Activa',
        2=>'Inactiva'
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

}
