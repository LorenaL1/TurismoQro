<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'ContentController@getHome')->name('home');

//Modulo de atractivosh
Route::get('/attractiveh', 'AttractivehController@getAttractiveh')->name('attractiveh');
Route::get('/attractiveh/category/{id}/{slug}', 'AttractivehController@getCategory')->name('attractive_category');
Route::post('/search', 'AttractivehController@postSearch')->name('search');

//modulo hospedaje
Route::get('/hospedajeh', 'HospedajehController@getHospedajeh')->name('hospedajeh');

/*Route::get('/', function () {
    return view('welcome');
});*/

// Router Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');

//Module atractivos
Route::get('/attractive/{id}/{slug}', 'AttractiveController@getAttractive')->name('attractive_single');

//Module hospedaje
Route::get('/hospedaje/{id}/{slug}', 'HospedajeController@getHospedaje')->name('hospedaje_single');

// Ajax Api Routers
Route::get('/md/api/load/attractives/{section}', 'ApiJsController@getAttractivesSection');
Route::get('/md/api/load/hospedajes/{section}', 'ApiJsController@getHospedajesSection');
