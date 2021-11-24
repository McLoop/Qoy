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
                2=>'Tarata',
                3=>'Arque',
                4=>'Independencia',
                5=>'Aiquile',
                6=>'Villa Capinota',
                7=>'Cercado',
                8=>'Totora',
                9=>'Sacaba',
                10=>'Cliza',
                11=>'Mizque',
                12=>'Punata',
                13=>'Quillacollo',
                14=>'Tapacari',
                15=>'Bolivar',
                16=>'Tiraque'
	);

	const ZONA = array(
		1=>'Central',
		2=>'Norte',
                3=>'Sud'
	);

	const UBICATION = array(
		1=>'Arani Zona Central',
		2=>'Arani Zona Norte',
                3=>'Arani Zona Sur',
                4=>'Tarata Zona Central',
		5=>'Tarata Zona Norte',
                6=>'Tarata Zona Sur',
                7=>'Arque Zona Central',
                8=>'Arque Zona Norte',
                9=>'Arque Zona Sur',
                10=>'Independencia Zona Central',
                11=>'Independencia Zona Norte',
                12=>'Independencia Zona Sur',
                13=>'Aiquile Zona Central',
                14=>'Aiquile Zona Norte',
                15=>'Aiquile Zona Sur',
                16=>'Villa Capinota Zona Central',
                17=>'Villa Capinota Zona Norte',
                18=>'Villa Capinota Zona Sur',
                19=>'Cercado Zona Central',
                20=>'Cercado Zona Norte',
                21=>'Cercado Zona Sur',
                22=>'Totora Zona Central',
                23=>'Totora Zona Norte',
                24=>'Totora Zona Sur',
                25=>'Sacaba Zona Central',
                26=>'Sacaba Zona Norte',
                27=>'Sacaba Zona Sur',
                28=>'Cliza Zona Central',
                29=>'Cliza Zona Norte',
                30=>'Cliza Zona Sur',
                31=>'Mizque Zona Central',
                32=>'Mizque Zona Norte',
                33=>'Mizque Zona Sur',
                34=>'Punata Zona Central',
                35=>'Punata Zona Norte',
                36=>'Punata Zona Sur',
                37=>'Quillacollo Zona Central',
                38=>'Quillacollo Zona Norte',
                39=>'Quillacollo Zona Sur',
                40=>'Tapacari Zona Central',
                41=>'Tapacari Zona Norte',
                42=>'Tapacari Zona Sur',
                43=>'Bolivar Zona Central',
                44=>'Bolivar Zona Norte',
                45=>'Bolivar Zona Sur',
                46=>'Tiraque Zona Central',
                47=>'Tiraque Zona Norte',
                48=>'Tiraque Zona Sur'
	);

}
