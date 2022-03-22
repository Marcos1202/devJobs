<?php

use App\Http\Controllers\CandidatoController;
use Illuminate\Support\Facades\Route;

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



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Rutas protegidas
Route::group(['middleware' => ['auth', 'verified']], function(){
    //Rutas de las vacantes
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', 'VacanteController@edit')->name('vacante.edit');
    Route::put('/vacantes/{vacante}/', 'VacanteController@update')->name('vacante.update');

    //Subir imagenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarImagen')->name('vacantes.borrar');
    
    //Cambiar estado de la vacante
    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');
    


    //Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');
});

//Pagina de inicio
Route::get('/', 'InicioController')->name('inicio');

//Categorias
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');

//Enviar datos para una vacante 
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');


//Rutas de las vacantes
Route::get('/vacante/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/vacante/buscar', 'VacanteController@buscar')->name('vacantes.buscar');
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');


