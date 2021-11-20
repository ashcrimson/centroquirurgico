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
        $this->call(ContactoTiposTableSeeder::class);
        $this->call(GrupoBaseTableSeeder::class);
        $this->call(InsumoEspecificoTableSeeder::class);
        $this->call(ReparticionesTableSeeder::class);
        $this->call(SistemaSaludTableSeeder::class);
        $this->call(ConveniosTableSeeder::class);
        $this->call(MedicamentosTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(ExamenesTableSeeder::class);


        if (app()->environment()=='local'){
            $this->call(PacientesTableSeeder::class);
            $this->call(PartesTableSeeder::class);
        }
    }
}
