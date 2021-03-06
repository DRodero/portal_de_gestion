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

Route::get('/', function() {
    return view('portada');
})->middleware('auth');

/*
    -- Acciones

    GET   /proyectos (index)
    POST  /proyectos (store)
    PATCH /proyectos/1 (update)
    DELETE /proyectos/1 (destroy)

    -- Mostrar formularios

    GET   /proyectos/create (create)
    GET   /proyectos/1/edit (edit)
    GET   /proyectos/1 (show)
*/


/*Route::get('proyectos', 'ProyectosController@index');
Route::post('proyectos', 'ProyectosController@store');
Route::patch('proyectos/{proyecto}', 'ProyectosController@update');
Route::delete('proyectos/{proyecto}', 'ProyectosController@destroy');

Route::get('proyectos/create', 'ProyectosController@create');
Route::get('proyectos/{proyecto}/edit', 'ProyectosController@edit');
Route::get('proyectos/{proyecto}', 'ProyectosController@show');*/


Route::get('proyectos/pdf', 'ProyectosController@pdf');

Route::get('proyectos/excel', 'ProyectosController@excel');

Route::resource('proyectos', 'ProyectosController');

Route::resource('incidencias', 'IncidenciasController');

Route::get('proyectos/{id}/pdf_html', 'ProyectosController@pdf_html');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('subir_ficheros', 'HomeController@subir_ficheros');

Route::post('subir_ficheros', 'HomeController@subida');


