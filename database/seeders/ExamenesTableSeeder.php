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

        factory(Examen::class,1)->create(['name' => 'Hemograma VHS']);
        factory(Examen::class,1)->create(['name' => 'Glicemia']);
        factory(Examen::class,1)->create(['name' => 'Uremia']);
        factory(Examen::class,1)->create(['name' => 'Orina completa']);
        factory(Examen::class,1)->create(['name' => 'Protrombina']);
        factory(Examen::class,1)->create(['name' => 'TTPK']);
        factory(Examen::class,1)->create(['name' => 'Electrocardiograma']);
        factory(Examen::class,1)->create(['name' => 'Hematocrito']);

    }
}
