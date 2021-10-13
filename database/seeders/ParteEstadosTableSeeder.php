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
        factory(ParteEstado::class,1)->create(['nombre' => 'Solicitada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Aprobada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Despachada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Rechazada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Anulada']);
        factory(ParteEstado::class,1)->create(['nombre' => 'Vencida']);
        factory(ParteEstado::class,1)->create(['nombre' => 'EN CORRECCIÓN']);


    }
}
