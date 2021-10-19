<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call(OptionsTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
        $this->call(ClasificacionesTableSeeder::class);
        $this->call(CirugiaTiposTableSeeder::class);
        $this->call(PabellonesTableSeeder::class);
        $this->call(ParteEstadosTableSeeder::class);
        $this->call(PreoperatoriosTableSeeder::class);
        $this->call(IntervencionesTableSeeder::class);
        $this->call(DiagnosticosTableSeeder::class);

        if (app()->environment()=='local'){
            $this->call(PacientesTableSeeder::class);
            $this->call(PartesTableSeeder::class);
    }
    }
}
