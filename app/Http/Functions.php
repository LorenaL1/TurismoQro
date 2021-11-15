<?php 

//key value from json
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}

function getModulesArray(){
	$a = [
		'0' => 'Atractivos',
		'1' => 'Blog'
	];

	return $a;
}

function getRoleUserArray($mode, $id){
	$roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;

}

function getUserStatusArray($mode, $id){
	$status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
}

function user_permissions(){
	$p = [
		'dashboard' => [
			'icon' => '<i class="fa fa-home" aria-hidden="true"></i>',
			'title' => 'Modulo Escritorio',
			'keys' => [
				'dashboard' => 'Puede ver el escritorio.',
				'dashboard_small_stats' => 'Puede ver las estadísticas rápidas.',

			]
		],
		'attractives' => [
			'icon' => '<i class="fa fa-cubes" aria-hidden="true"></i>',
			'title' => 'Modulo Atractivos',
			'keys' => [
				'attractives' => 'Puede ver el listado de Atractivos.',
				'attractive_add' => 'Puede agregar nuevos Atractivos.',
				'attractive_edit' => 'Puede editar Atractivos.',
				'attractive_search' => 'Puede buscar Atractivos.',
				'attractive_delete' => 'Puede eliminar Atractivos.',
				'attractive_gallery_add' => 'Agregar imagenes a la galeria del Atractivo.',
				'attractive_gallery_delete' => 'Eliminar imagenes de la galeria del Atractivo.',

			]
		],

		'hospedajes' => [
			'icon' => '<i class="fa fa-cubes" aria-hidden="true"></i>',
			'title' => 'Modulo Hospedaje',
			'keys' => [
				'hospedajes' => 'Puede ver el listado de Hospedajes.',
				'hospedaje_add' => 'Puede agregar nuevos Hospedajes.',
				'hospedaje_edit' => 'Puede editar Hospedajes.',
				'hospedaje_search' => 'Puede buscar Hospedajes.',
				'hospedaje_delete' => 'Puede eliminar Hospedajes.',
				'hospedaje_gallery_add' => 'Agregar imagenes a la galeria del Hospedajes.',
				'hospedaje_gallery_delete' => 'Eliminar imagenes de la galeria del Hospedajes.',

			]
		],

		'categories' => [
			'icon' => '<i class="fa fa-folder" aria-hidden="true"></i>',
			'title' => 'Modulo de Categorias',
			'keys' => [
				'categories' => 'Puede ver la lista de categorías.',
				'category_add' => 'Puede agregar categorías.',
				'category_edit' => 'Puede editar categorías.',
				'category_delete' => 'Puede eliminar categorías.',

			]
		],
		'users' => [
			'icon' => '<i class="fa fa-users" aria-hidden="true"></i>',
			'title' => 'Modulo de Usuarios',
			'keys' => [
				'user_list' => 'Puede ver la lista de usuarios.',
				'user_edit' => 'Puede editar usuarios.',
				'user_banned' => 'Puede suspender usuarios.',
				'user_permissions' => 'Puede administrar permisos de usuario.',
			]
		],
		'sliders' => [
			'icon' => '<i class="far fa-images"></i>',
			'title' => 'Modulo de Sliders',
			'keys' => [
				'sliders_list' => 'Puede ver la lista de sliders.',
				'slider_add' => 'Puede agregar sliders.',
				'slider_edit' => 'Puede editar los sliders.',
				'slider_delete' => 'Puede eliminar los sliders.'
			]
		],
		'settings' => [
			'icon' => '<i class="fas fa-cogs"></i>',
			'title' => 'Modulo de Configuraciones',
			'keys' => [
				'settings' => 'Puede modificar la configuración.'
			]
		],
		
		

	];

	return $p;
}