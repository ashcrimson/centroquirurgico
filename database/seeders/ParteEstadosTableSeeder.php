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


        factory(ParteEstado::class,1)->create(['siglas' => 'TP','nombre' => 'Temporal']);
        factory(ParteEstado::class,1)->create(['siglas' => 'IG','nombre' => 'Ingresada']);
        factory(ParteEstado::class,1)->create(['siglas' => 'EA','nombre' => 'Enviada Admisión']);
        factory(ParteEstado::class,1)->create(['siglas' => 'LE','nombre' => 'Inscrito en lista de espera']);
        factory(ParteEstado::class,1)->create(['siglas' => 'PR','nombre' => 'Programado']);
        factory(ParteEstado::class,1)->create(['siglas' => 'SU','nombre' => 'Suspendido']);
        factory(ParteEstado::class,1)->create(['siglas' => 'AC','nombre' => 'Activación']);
        factory(ParteEstado::class,1)->create(['siglas' => 'EL','nombre' => 'Eliminado']);


    }
}
