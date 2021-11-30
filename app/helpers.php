<?php

function setActive($routeName){
	return request()->routeIs($routeName) ? 'active' : '';
}

function prueba($idPost){
     toast('prueba','info');
        return redirect()->route('editar_post', $idPost);
}

function mandarNotificaciones($idCategoria){
	
}