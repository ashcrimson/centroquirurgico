<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Route::getRoutes() as $route){

            Permission::firstOrCreate(['name' => 'Ver configuración']);
            Permission::firstOrCreate(['name' => 'Crear configuración']);
            Permission::firstOrCreate(['name' => 'Editar configuración']);
            Permission::firstOrCreate(['name' => 'Eliminar configuración']);

            Permission::firstOrCreate(['name' => 'Ver opcion menu']);
            Permission::firstOrCreate(['name' => 'Crear opcion menu']);
            Permission::firstOrCreate(['name' => 'Editar opcion menu']);
            Permission::firstOrCreate(['name' => 'Eliminar opcion menu']);

            Permission::firstOrCreate(['name' => 'Ver permisos']);
            Permission::firstOrCreate(['name' => 'Crear permisos']);
            Permission::firstOrCreate(['name' => 'Editar permisos']);
            Permission::firstOrCreate(['name' => 'Eliminar permisos']);

            Permission::firstOrCreate(['name' => 'Ver roles']);
            Permission::firstOrCreate(['name' => 'Crear roles']);
            Permission::firstOrCreate(['name' => 'Editar roles']);
            Permission::firstOrCreate(['name' => 'Eliminar roles']);

            Permission::firstOrCreate(['name' => 'Ver usuarios']);
            Permission::firstOrCreate(['name' => 'Crear usuarios']);
            Permission::firstOrCreate(['name' => 'Editar usuarios']);
            Permission::firstOrCreate(['name' => 'Eliminar usuarios']);

            Permission::firstOrCreate(['name' => 'Ver Partes']);
            Permission::firstOrCreate(['name' => 'Crear Partes']);
            Permission::firstOrCreate(['name' => 'Editar Partes']);
            Permission::firstOrCreate(['name' => 'Editar Partes Admisión']);
            Permission::firstOrCreate(['name' => 'Eliminar Partes']);

            Permission::firstOrCreate(['name' => 'Ver Pacientes']);
            Permission::firstOrCreate(['name' => 'Crear Pacientes']);
            Permission::firstOrCreate(['name' => 'Editar Pacientes']);
            Permission::firstOrCreate(['name' => 'Eliminar Pacientes']);

            Permission::firstOrCreate(['name' => 'Ver Cirugia Tipos']);
            Permission::firstOrCreate(['name' => 'Crear Cirugia Tipos']);
            Permission::firstOrCreate(['name' => 'Editar Cirugia Tipos']);
            Permission::firstOrCreate(['name' => 'Eliminar Cirugia Tipos']);

            Permission::firstOrCreate(['name' => 'Ver clasificaciones']);
            Permission::firstOrCreate(['name' => 'Crear clasificaciones']);
            Permission::firstOrCreate(['name' => 'Editar clasificaciones']);
            Permission::firstOrCreate(['name' => 'Eliminar clasificaciones']);

            Permission::firstOrCreate(['name' => 'Ver Condiciones']);
            Permission::firstOrCreate(['name' => 'Crear Condiciones']);
            Permission::firstOrCreate(['name' => 'Editar Condiciones']);
            Permission::firstOrCreate(['name' => 'Eliminar Condiciones']);

            Permission::firstOrCreate(['name' => 'Ver Convenios',]);
            Permission::firstOrCreate(['name' => 'Crear Convenios',]);
            Permission::firstOrCreate(['name' => 'Editar Convenios',]);
            Permission::firstOrCreate(['name' => 'Eliminar Convenios',]);

            Permission::firstOrCreate(['name' => 'Ver Diagnosticos']);
            Permission::firstOrCreate(['name' => 'Crear Diagnosticos']);
            Permission::firstOrCreate(['name' => 'Editar Diagnosticos']);
            Permission::firstOrCreate(['name' => 'Eliminar Diagnosticos']);

            Permission::firstOrCreate(['name' => 'Ver especialidades']);
            Permission::firstOrCreate(['name' => 'Crear especialidades']);
            Permission::firstOrCreate(['name' => 'Editar especialidades']);
            Permission::firstOrCreate(['name' => 'Eliminar especialidades']);

            Permission::firstOrCreate(['name' => 'Ver Grupo Bases']);
            Permission::firstOrCreate(['name' => 'Crear Grupo Bases']);
            Permission::firstOrCreate(['name' => 'Editar Grupo Bases']);
            Permission::firstOrCreate(['name' => 'Eliminar Grupo Bases']);

            Permission::firstOrCreate(['name' => 'Ver Insumo Especificos']);
            Permission::firstOrCreate(['name' => 'Crear Insumo Especificos']);
            Permission::firstOrCreate(['name' => 'Editar Insumo Especificos']);
            Permission::firstOrCreate(['name' => 'Eliminar Insumo Especificos']);

            Permission::firstOrCreate(['name' => 'Ver intervenciones']);
            Permission::firstOrCreate(['name' => 'Crear intervenciones']);
            Permission::firstOrCreate(['name' => 'Editar intervenciones']);
            Permission::firstOrCreate(['name' => 'Eliminar intervenciones']);

            Permission::firstOrCreate(['name' => 'Ver Medicamentos']);
            Permission::firstOrCreate(['name' => 'Crear Medicamentos']);
            Permission::firstOrCreate(['name' => 'Editar Medicamentos']);
            Permission::firstOrCreate(['name' => 'Eliminar Medicamentos']);

            Permission::firstOrCreate(['name' => 'Ver pabellones']);
            Permission::firstOrCreate(['name' => 'Crear pabellones']);
            Permission::firstOrCreate(['name' => 'Editar pabellones']);
            Permission::firstOrCreate(['name' => 'Eliminar pabellones']);

            Permission::firstOrCreate(['name' => 'Ver Parte Intervencions']);
            Permission::firstOrCreate(['name' => 'Crear Parte Intervencions']);
            Permission::firstOrCreate(['name' => 'Editar Parte Intervencions']);
            Permission::firstOrCreate(['name' => 'Eliminar Parte Intervencions']);

            Permission::firstOrCreate(['name' => 'Ver Intervenciones News']);
            Permission::firstOrCreate(['name' => 'Crear Intervenciones News']);
            Permission::firstOrCreate(['name' => 'Editar Intervenciones News']);
            Permission::firstOrCreate(['name' => 'Eliminar Intervenciones News']);

            Permission::firstOrCreate(['name' => 'Ver Especialidad Subs']);
            Permission::firstOrCreate(['name' => 'Crear Especialidad Subs']);
            Permission::firstOrCreate(['name' => 'Editar Especialidad Subs']);
            Permission::firstOrCreate(['name' => 'Eliminar Especialidad Subs']);

            Permission::firstOrCreate(['name' => 'Ver Contacto Tipos']);
            Permission::firstOrCreate(['name' => 'Crear Contacto Tipos']);
            Permission::firstOrCreate(['name' => 'Editar Contacto Tipos']);
            Permission::firstOrCreate(['name' => 'Eliminar Contacto Tipos']);

            Permission::firstOrCreate(['name' => 'Ver Sistema Saluds']);
            Permission::firstOrCreate(['name' => 'Crear Sistema Saluds']);
            Permission::firstOrCreate(['name' => 'Editar Sistema Saluds']);
            Permission::firstOrCreate(['name' => 'Eliminar Sistema Saluds']);

            Permission::firstOrCreate(['name' => 'Ver Preoperatorios']);
            Permission::firstOrCreate(['name' => 'Crear Preoperatorios']);
            Permission::firstOrCreate(['name' => 'Editar Preoperatorios']);
            Permission::firstOrCreate(['name' => 'Eliminar Preoperatorios']);

        }

    }
}
