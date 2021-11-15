<?php
 
 Route::prefix('/admin')->group(function(){
 	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

 	//Modulo de configuraciones (settings)
 	Route::get('/settings', 'Admin\SettingsController@getHome')->name('settings');
 	Route::post('/settings', 'Admin\SettingsController@postHome')->name('settings');


 	//Modulo de usuarios
 	Route::get('/users/{status}', 'Admin\UserController@getUsers')->name('user_list');
 	Route::get('/user/{id}/edit', 'Admin\UserController@getUserEdit')->name('user_edit');
 	Route::post('/user/{id}/edit', 'Admin\UserController@postUserEdit')->name('user_edit');
 	Route::get('/user/{id}/banned', 'Admin\UserController@getUserBanned')->name('user_banned');
 	Route::get('/user/{id}/permissions', 'Admin\UserController@getUserPermissions')->name('user_permissions');
 	Route::post('/user/{id}/permissions', 'Admin\UserController@postUserPermissions')->name('user_permissions');
 	

 	//MODULE ATTRACTIVE
 	Route::get('/attractives/{status}', 'Admin\AttractiveController@getHome')->name('attractives');
 	Route::get('/attractive/add', 'Admin\AttractiveController@getAttractiveAdd')->name('attractive_add');
    Route::get('/attractive/{id}/edit', 'Admin\AttractiveController@getAttractiveEdit')->name('attractive_edit');
    Route::get('/attractive/{id}/delete', 'Admin\AttractiveController@getAttractiveDelete')->name('attractive_delete');
 	Route::get('/attractive/{id}/restore', 'Admin\AttractiveController@getAttractiveRestore')->name('attractive_delete');

 	Route::post('/attractive/add', 'Admin\AttractiveController@postAttractiveAdd')->name('attractive_add');
 	Route::post('/attractive/search', 'Admin\AttractiveController@postAttractiveSearch')->name('attractive_search');
 	Route::post('/attractive/{id}/edit', 'Admin\AttractiveController@postAttractiveEdit')->name('attractive_edit');

 	Route::post('/attractive/{id}/gallery/add', 
 		'Admin\AttractiveController@postAttractiveGalleryAdd')->name('attractive_gallery_add');
 	Route::get('/attractive/{id}/gallery/{gid}/delete', 
 		'Admin\AttractiveController@getAttractiveGalleryDelete')->name('attractive_gallery_delete');

 	//hospedaje
 	Route::get('/hospedajes/{status}', 'Admin\HospedajeController@getHome')->name('hospedajes');
 	Route::get('/hospedaje/add', 'Admin\HospedajeController@getHospedajeAdd')->name('hospedaje_add');
 	Route::get('/hospedaje/{id}/edit', 'Admin\HospedajeController@getHospedajeEdit')->name('hospedaje_edit');
 	Route::get('/hospedaje/{id}/delete', 'Admin\HospedajeController@getHospedajeDelete')->name('hospedaje_delete');
 	Route::get('/hospedaje/{id}/restore', 'Admin\HospedajeController@getHospedajeRestore')->name('hospedaje_delete');

 	Route::post('/hospedaje/add', 'Admin\HospedajeController@postHospedajeAdd')->name('hospedaje_add');
 	Route::post('/hospedaje/search', 'Admin\HospedajeController@postHospedajeSearch')->name('hospedaje_search');
 	Route::post('/hospedaje/{id}/edit', 'Admin\HospedajeController@postHospedajeEdit')->name('hospedaje_edit');
 	Route::post('/hospedaje/{id}/gallery/add', 
 		'Admin\HospedajeController@postHospedajeGalleryAdd')->name('hospedaje_gallery_add');
 	Route::get('/hospedaje/{id}/gallery/{gid}/delete', 
 		'Admin\HospedajeController@getHospedajeGalleryDelete')->name('hospedaje_gallery_delete');

 	
    //categorias
 	Route::get('/categories/{module}', 'Admin\CategoriesController@getHome')->name('categories');
 	Route::post('/category/add/{module}', 'Admin\CategoriesController@postCategoryAdd')->name('category_add');
 	Route::get('/category/{id}/edit', 'Admin\CategoriesController@getCategoryEdit')->name('category_edit');
 	Route::post('/category/{id}/edit', 'Admin\CategoriesController@postCategoryEdit')->name('category_edit');
 	Route::get('/category/{id}/subs', 'Admin\CategoriesController@getSubCategories')->name('category_edit');
 	Route::get('/category/{id}/delete', 'Admin\CategoriesController@getCategoryDelete')->name('category_delete');

 	// Sliders
 	Route::get('/sliders', 'Admin\SliderController@getHome')->name('sliders_list');
 	Route::post('/slider/add', 'Admin\SliderController@postSliderAdd')->name('slider_add');
 	Route::get('/slider/{id}/edit', 'Admin\SliderController@getSliderEdit')->name('slider_edit');
 	Route::post('/slider/{id}/edit', 'Admin\SliderController@postSliderEdit')->name('slider_edit');
 	Route::get('/slider/{id}/delete', 'Admin\SliderController@getSliderDelete')->name('slider_delete');

 	
 	//JavaScript Request
 	Route::get('/md/api/load/subcategories/{parent}', 'Admin\ApiController@getSubCategories');
 });

 

