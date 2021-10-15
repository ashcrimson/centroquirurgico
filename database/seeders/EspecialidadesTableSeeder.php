<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('especialidades')->delete();


        factory(Especialidad::class,1)->create(['nombre' => 'Cirugía General']);
        factory(Especialidad::class,1)->create(['nombre' => 'Vascular']);
        factory(Especialidad::class,1)->create(['nombre' => 'Neurocirugía']);


    }
}
