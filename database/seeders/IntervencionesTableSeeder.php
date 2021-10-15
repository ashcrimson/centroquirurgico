<?php

namespace Database\Seeders;

use App\Models\Intervencion;
use Illuminate\Database\Seeder;

class IntervencionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('intervenciones')->delete();


        factory(Intervencion::class,10)->create();

    }
}
