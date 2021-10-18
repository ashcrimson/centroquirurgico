<?php

namespace Database\Seeders;

use App\Models\Clasificacion;
use Illuminate\Database\Seeder;

class ClasificacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('clasificaciones')->delete();

        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 1']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 2']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 3']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 4']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 5']);

        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 1-E']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 2-E']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 3-E']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 4-E']);
        factory(Clasificacion::class,1)->create(['nombre' => 'ASA 5-E']);

    }
}
