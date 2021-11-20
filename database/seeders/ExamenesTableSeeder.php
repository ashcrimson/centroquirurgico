<?php

namespace Database\Seeders;

use App\Models\Examen;
use Illuminate\Database\Seeder;

class ExamenesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('examenes')->delete();

        factory(Examen::class,1)->create(['nombre' => 'Hemograma VHS']);
        factory(Examen::class,1)->create(['nombre' => 'Glicemia']);
        factory(Examen::class,1)->create(['nombre' => 'Uremia']);
        factory(Examen::class,1)->create(['nombre' => 'Orina completa']);
        factory(Examen::class,1)->create(['nombre' => 'Protrombina']);
        factory(Examen::class,1)->create(['nombre' => 'TTPK']);
        factory(Examen::class,1)->create(['nombre' => 'Electrocardiograma']);
        factory(Examen::class,1)->create(['nombre' => 'Hematocrito']);

    }
}
