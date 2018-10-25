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

// RUTA PRINCIPAL DE LA PAGINA WEB

Route::get('/', function () {
    return view('auth.login');
});

// RUTA PARA LOGUEO DE USUARIO INVITADO CON AUTENTICACION

Route::resource('Invitado/procesos', 'ProcesosController')->middleware('auth');

// RUTA PARA LOGUEO DE USUARIO INVITADO CON AUTENTICACION

Route::resource('Admin/procesosadmin', 'ProcesosAdminController')->middleware('auth');


//VINCULACION DE DEPENDENCIAS PARA PROCESOS
Route::bind('proceso', function($proceso){
    return App\Proceso::find($proceso);
});

// RUTAS PARA EL INICIO DE SESION, RECUPERAR CONTRASEÑA Y REGISTRARSE

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
