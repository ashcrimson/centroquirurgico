<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('porta/login/{email}','Auth\LoginController@loginPortal')->name('login.portal');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'dev','as' => 'dev.'],function (){

        Route::get('prueba/api','PruebaApiController@index')->name('prueba.api');

        Route::get('passport/clients', 'PassportClientsController@index')->name('passport.clients');

        Route::resource('configurations', 'ConfigurationController');

    });

    Route::get('/', 'ParteController@index')->name('index');
    Route::get('/home', 'ParteController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/calendar', 'HomeController@calendar')->name('calendar');

    Route::get('profile/business', 'BusinessProfileController@index')->name('profile.business');
    Route::post('profile/business', 'BusinessProfileController@store')->name('profile.business.store');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::post('profile/{user}/edit/avatar', 'ProfileController@editAvatar')->name('profile.edit.avatar');

    Route::resource('users', 'UserController');
    Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
    Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

    Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
    Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
    Route::resource('options',"OptionController");

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('pacientes', 'PacienteController');
    Route::get('get/data/paciente', 'PacienteController@getPacientePorApi')->name('get.datos.paciente');

    Route::resource('cirugiaTipos', 'CirugiaTipoController');

    Route::resource('especialidades', 'EspecialidadController');

    Route::resource('preoperatorios', 'PreoperatorioController');

    Route::resource('parteEstados', 'ParteEstadoController');

    Route::resource('pabellones', 'PabellonController');

    Route::resource('clasificaciones', 'ClasificacionController');

    Route::get('partes/valida/preop/{tipo}/{parte}', 'ParteController@validarPreopStore')->name('partes.validar.store');
    Route::get('partes/validar', 'ParteController@validarPreop')->name('partes.validar.index');
    Route::resource('partes', 'ParteController');
    Route::get('partes/mis/partes', 'ParteController@misPartes')->name('partes.mis.partes');
    Route::get('partes/imprimir/parte/{id}', 'ParteController@imprimirParte')->name('partes.imprimir.parte');

    Route::group(['prefix' => 'admision','as' => 'admision.'],function (){
        Route::get('partes', 'ParteAdmisionController@index')->name('partes');
        Route::get('partes/{parte}/edit', 'ParteAdmisionController@edit')->name('partes.edit');
        Route::patch('partes/{parte}/edit', 'ParteAdmisionController@update')->name('partes.update');
        Route::get('partes/bitacora/store/{parte}', 'ParteController@bitacoraStore')->name('bitacora.store');
        Route::get('partes/lista/espera', 'ParteAdmisionController@listaEspera')->name('partes.lista.espera');
    });

    Route::resource('intervenciones', 'IntervencionController');

    Route::resource('diagnosticos', 'DiagnosticoController');

    Route::resource('medicamentos', 'MedicamentoController');

    Route::resource('contactoTipos', 'ContactoTipoController');

    Route::resource('grupoBases', 'GrupoBaseController');

    Route::resource('insumoEspecificos', 'InsumoEspecificoController');

    Route::resource('reparticions', 'ReparticionController');

    Route::resource('sistemaSalud', 'SistemaSaludController');

    Route::resource('convenios', 'ConvenioController');

    Route::resource('parteContactos', 'ParteContactoController');

    Route::resource('parentescos', 'ParentescoController');

    Route::resource('parteExamens', 'ParteExamenController');

    Route::resource('examens', 'ExamenController');

    Route::resource('intervencionesNews', 'IntervencionesNewController');

    Route::resource('especialidadSubs', 'EspecialidadSubController');

    Route::resource('parteHistoricos', 'ParteHistoricoController');

    ///Colocar ariba de esta linea las rutas a proteger por autenticacion

});

//################# OOOOJJJJJJOOOOOOOOOOOOOOOOOooo ########################
//las rutas que se coloque debajo de esta linea NOOOO estan protegidas por autenticaci??n
