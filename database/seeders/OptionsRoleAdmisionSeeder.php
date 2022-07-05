<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class OptionsRoleAdmisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * @var Role $role
         */
        $role = Role::find(Role::ADMISION);

        // MANTENEDORES
        $role->options()->sync([
            22, //partes admision
            14, //Pacientes
            29, //Medicamentos
//            16,
            17,
            18,
            19,
            20,
            21,
            23,
            24,
            25,
//            26,
            27,
            28,
//            32,
//            33,
        ]);

        $role->syncPermissions([
            'Ver Partes',
            'Crear Partes',
            'Editar Partes',
            'Eliminar Partes',
            'Ver Intervenciones News',
            'Crear Intervenciones News',
            'Editar Intervenciones News',
            'Eliminar Intervenciones News',
            'Ver Especialidad Subs',
            'Crear Especialidad Subs',
            'Editar Especialidad Subs',
            'Eliminar Especialidad Subs',
            'Ver Contacto Tipos',
            'Crear Contacto Tipos',
            'Editar Contacto Tipos',
            'Eliminar Contacto Tipos',
            'Ver Grupo Bases',
            'Crear Grupo Bases',
            'Editar Grupo Bases',
            'Eliminar Grupo Bases',
            'Ver Insumo Especificos',
            'Crear Insumo Especificos',
            'Editar Insumo Especificos',
            'Eliminar Insumo Especificos',
            'Ver Sistema Saluds',
            'Crear Sistema Saluds',
            'Editar Sistema Saluds',
            'Eliminar Sistema Saluds',
            'Ver Convenios',
            'Crear Convenios',
            'Editar Convenios',
            'Eliminar Convenios',
            'Ver Medicamentos',
            'Crear Medicamentos',
            'Editar Medicamentos',
            'Eliminar Medicamentos',
            'Ver Preoperatorios',
            'Crear Preoperatorios',
            'Editar Preoperatorios',
            'Eliminar Preoperatorios',
            'Ver pabellones',
            'Crear pabellones',
            'Editar pabellones',
            'Eliminar pabellones',
            'Ver clasificaciones',
            'Crear clasificaciones',
            'Editar clasificaciones',
            'Eliminar clasificaciones',
            'Ver Cirugia Tipos',
            'Crear Cirugia Tipos',
            'Editar Cirugia Tipos',
            'Eliminar Cirugia Tipos',
            'Ver especialidades',
            'Crear especialidades',
            'Editar especialidades',
            'Eliminar especialidades',
        ]);

    }
}
