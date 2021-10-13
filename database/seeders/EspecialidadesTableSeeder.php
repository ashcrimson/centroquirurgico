<?php

namespace Database\Seeders;

use App\Models\Especialida;
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

        factory(Especialida::class,10)->create();

    }
}
