<?php

Route::group(['as'=>'api.','namespace' => 'API'], function () {

    Route::resource('options', 'OptionAPIController');



    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', 'PermissionAPIController');

        Route::resource('roles', 'RoleAPIController');

        Route::resource('users', 'UserAPIController');
        Route::get('user/add/shortcut/{user}', 'UserAPIController@addShortcut')->name('users.add_shortcut');
        Route::get('user/remove/shortcut/{user}', 'UserAPIController@removeShortcut')->name('users.remove_shortcut');

        Route::resource('pacientes', 'PacienteAPIController');

        Route::resource('cirugia_tipos', 'CirugiaTipoAPIController');

        Route::resource('especialidades', 'EspecialidadAPIController');

        Route::resource('preoperatorios', 'PreoperatorioAPIController');

        Route::resource('parte_estados', 'ParteEstadoAPIController');

        Route::resource('pabellones', 'PabellonAPIController');

        Route::resource('clasificaciones', 'ClasificacionAPIController');

        Route::resource('partes', 'ParteAPIController');

        Route::resource('intervenciones', 'IntervencionAPIController');

        Route::resource('diagnosticos', 'DiagnosticoAPIController');

        Route::resource('medicamentos', 'MedicamentoAPIController');

        Route::resource('bitacoras', 'BitacoraAPIController');

        Route::resource('medicamentos', 'MedicamentoAPIController');

        Route::resource('contacto_tipos', 'ContactoTipoAPIController');

        Route::resource('grupo_bases', 'GrupoBaseAPIController');

        Route::resource('insumo_especificos', 'InsumoEspecificoAPIController');

        Route::resource('parte_contactos', 'ParteContactoAPIController');

        Route::resource('parte_intervenciones', 'ParteIntervencionAPIController');

        Route::resource('parte_diagnosticos', 'ParteDiagnosticoAPIController');

        Route::resource('parte_medicamentos', 'ParteMedicamentoAPIController');

        Route::resource('sistema_saluds', 'SistemaSaludAPIController');

        Route::resource('convenios', 'ConvenioAPIController');

//        Route::resource('parte_intervenciones', 'ParteIntervencionAPIController');

        Route::resource('reparticiones', 'ReparticionAPIController');

        Route::resource('parentescos', 'ParentescoAPIController');

        Route::resource('parte_examenes', 'ParteExamenAPIController');
        Route::resource('examenes', 'ExamenAPIController');

        Route::resource('intervenciones_news', 'IntervencionesNewAPIController');
    });




});
