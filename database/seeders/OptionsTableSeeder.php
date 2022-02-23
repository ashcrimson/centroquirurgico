<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'option_id' => NULL,
                'nombre' => 'Dashboard',
                'ruta' => 'dashboard',
                'descripcion' => NULL,
                'icono_l' => 'fa-chart-line',
                'icono_r' => NULL,
                'orden' => 0,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2020-08-26 11:51:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'option_id' => NULL,
                'nombre' => 'Admin',
                'ruta' => '',
                'descripcion' => NULL,
                'icono_l' => 'fa-tools',
                'icono_r' => NULL,
                'orden' => 21,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'option_id' => 2,
                'nombre' => 'Usuarios',
                'ruta' => 'users.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-users',
                'icono_r' => NULL,
                'orden' => 22,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'option_id' => 2,
                'nombre' => 'Roles',
                'ruta' => 'roles.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-user-tag',
                'icono_r' => NULL,
                'orden' => 23,
                'color' => 'bg-info',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'option_id' => 2,
                'nombre' => 'Permisos',
                'ruta' => 'permissions.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-key',
                'icono_r' => NULL,
                'orden' => 24,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'option_id' => 2,
                'nombre' => 'Configuraciones',
                'ruta' => 'profile.business',
                'descripcion' => NULL,
                'icono_l' => 'fa-cogs',
                'icono_r' => NULL,
                'orden' => 25,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2021-03-14 21:17:37',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'option_id' => NULL,
                'nombre' => 'Developer',
                'ruta' => 'x',
                'descripcion' => NULL,
                'icono_l' => 'fa-file-code',
                'icono_r' => NULL,
                'orden' => 26,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2021-03-14 21:11:34',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'option_id' => 7,
                'nombre' => 'Prueba API\'S',
                'ruta' => 'dev.prueba.api',
                'descripcion' => NULL,
                'icono_l' => 'fa-check-circle',
                'icono_r' => NULL,
                'orden' => 29,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:16',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'option_id' => 7,
                'nombre' => 'Configuraciones',
                'ruta' => 'dev.configurations.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-cogs',
                'icono_r' => NULL,
                'orden' => 28,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'option_id' => 7,
                'nombre' => 'Clientes Passport',
                'ruta' => 'dev.passport.clients',
                'descripcion' => NULL,
                'icono_l' => 'fa-passport',
                'icono_r' => NULL,
                'orden' => 30,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:16',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'option_id' => 7,
                'nombre' => 'Menu',
                'ruta' => 'options.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 27,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'option_id' => NULL,
                'nombre' => 'Partes',
                'ruta' => 'partes.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 4,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:31:06',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'option_id' => NULL,
                'nombre' => 'Nueva Parte',
                'ruta' => 'partes.create',
                'descripcion' => NULL,
                'icono_l' => 'fa-plus',
                'icono_r' => NULL,
                'orden' => 2,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:31:30',
                'updated_at' => '2021-10-13 00:49:51',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'option_id' => NULL,
                'nombre' => 'Pacientes',
                'ruta' => 'pacientes.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-hospital-user',
                'icono_r' => NULL,
                'orden' => 1,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:45:27',
                'updated_at' => '2021-09-16 15:45:38',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'option_id' => NULL,
                'nombre' => 'Mantenedores',
                'ruta' => 'x',
                'descripcion' => NULL,
                'icono_l' => 'fa-list-alt',
                'icono_r' => NULL,
                'orden' => 7,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-22 16:08:39',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'option_id' => 15,
                'nombre' => 'Estados Partes',
                'ruta' => 'parteEstados.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 18,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:41:55',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'option_id' => 15,
                'nombre' => 'Tipos Cirugias',
                'ruta' => 'cirugiaTipos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 19,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:42:25',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'option_id' => 15,
                'nombre' => 'Especialidades',
                'ruta' => 'especialidades.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 20,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:42:57',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'option_id' => 15,
                'nombre' => 'Preoperatorios',
                'ruta' => 'preoperatorios.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 15,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-13 00:52:56',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'option_id' => 15,
                'nombre' => 'Pabellones',
                'ruta' => 'pabellones.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 16,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-13 00:53:44',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'option_id' => 15,
                'nombre' => 'clasificaciones',
                'ruta' => 'clasificaciones.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 17,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-13 00:54:04',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'option_id' => NULL,
                'nombre' => 'Partes Admision',
                'ruta' => 'admision.partes',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 5,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-21 23:18:17',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'option_id' => 15,
                'nombre' => 'Tipos Contacto',
                'ruta' => 'contactoTipos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 8,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:33:33',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'option_id' => 15,
                'nombre' => 'Grupos Bases',
                'ruta' => 'grupoBases.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 9,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:34:06',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'option_id' => 15,
                'nombre' => 'Insumos Especificos',
                'ruta' => 'insumoEspecificos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 10,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:34:26',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'option_id' => 15,
                'nombre' => 'reparticiones',
                'ruta' => 'reparticiones.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 11,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:34:55',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'option_id' => 15,
                'nombre' => 'Sistemas de Salud',
                'ruta' => 'sistemaSalud.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 12,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:36:33',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'option_id' => 15,
                'nombre' => 'Convenios',
                'ruta' => 'convenios.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 13,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 14:36:54',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'option_id' => 15,
                'nombre' => 'Medicamentos',
                'ruta' => 'medicamentos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 14,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-10-22 15:04:43',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'option_id' => NULL,
                'nombre' => 'Lista De Espera',
                'ruta' => 'admision.partes.lista.espera',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 6,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-11-13 22:06:45',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'option_id' => NULL,
                'nombre' => 'Validar Partes',
                'ruta' => 'partes.validar.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 3,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2022-02-22 21:08:38',
                'updated_at' => '2022-02-22 21:10:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}