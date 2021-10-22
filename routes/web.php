<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

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

    Route::resource('partes', 'ParteController');

    Route::group(['prefix' => 'admision','as' => 'admision.'],function (){
        Route::get('partes', 'ParteController@admision')->name('partes');
        Route::get('partes/{parte}/edit', 'ParteController@editAdmision')->name('partes.edit');
        Route::get('partes/bitacora/store/{parte}', 'ParteController@bitacoraStore')->name('bitacora.store');
    });

    Route::resource('intervenciones', 'IntervencionController');

    Route::resource('diagnosticos', 'DiagnosticoController');

    ///aca se deben de colocal las ruas para que solo los usuarios auntenticados puedan ingreasr

    Route::resource('medicamentos', 'MedicamentoController');

    Route::resource('contactoTipos', 'ContactoTipoController');

    Route::resource('grupoBases', 'GrupoBaseController');

    Route::resource('insumoEspecificos', 'InsumoEspecificoController');

    Route::resource('reparticions', 'ReparticionController');

    Route::resource('sistemaSalud', 'SistemaSaludController');

    Route::resource('convenios', 'ConvenioController');
});

