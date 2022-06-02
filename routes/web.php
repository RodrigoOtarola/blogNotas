<?php

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

Route::get('/',[\App\Http\Controllers\PageController::class,'inicio'])->name('inicio');

Route::get('/detalle/{id}',[\App\Http\Controllers\PageController::class,'detalle'])->name('notas.detalle');

Route::get('/fotos',[\App\Http\Controllers\PageController::class,'fotos'])->name('fotos');

Route::get('/blog',[\App\Http\Controllers\PageController::class,'blog'])->name('blog');

Route::get('/nosotros/{nombre?}',[\App\Http\Controllers\PageController::class,'nosotros'])->name('nosotros');

//Para insertas campos de formulario
Route::post('/',[\App\Http\Controllers\PageController::class,'crear'])->name('notas.crear');

//Ruta para editar
Route::get('/editar/{id}',[\App\Http\Controllers\PageController::class,'editar'])->name('notas.editar');

//Editar con PUT
Route::put('/editar/{id}',[\App\Http\Controllers\PageController::class,'update'])->name('notas.update');

Route::delete('/eliminar/{id}',[\App\Http\Controllers\PageController::class,'eliminar'])->name('notas.eliminar');

//Declara rutas con parametros, pasando el ? en la url y cambiando el parametro se le puede asignar una por defecto, where es para dar condición.
//Route::get('fotos/{numero?}', function($numero='Sin numero'){
//    return 'estas en la galeria de fotos '.$numero;
//})->where('numero','[0-9]+');


//url es para el nombre de la url y view señala la ruta
//Route::view('galeria', 'fotos',['numero'=>125]);

//Route::get('fotos',function (){
//    return view('fotos');
//})->name('fotos');

//Route::get('blog',function (){
//    return view('blog');
//})->name('blog');

//Route::get('nosotros/{nombre?}',function (){
//
////    return view('nosotros',['equipo'=>$equipo]);
//
//})->name('nosotros');
