<?php

namespace Database\Seeders;

use App\Models\ParteEstado;
use Illuminate\Database\Seeder;

class ParteEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('parte_estados')->delete();


        factory(ParteEstado::class,1)->create(['nombre' => 'Temporal']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Ingresada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Enviada Admicion']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Inscrito en lista de espera']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Programado']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Suspendido']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Eliminado']);


    }
}
