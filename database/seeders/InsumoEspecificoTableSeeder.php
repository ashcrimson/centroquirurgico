<?php

namespace Database\Seeders;

use App\Models\InsumoEspecifico;
use Illuminate\Database\Seeder;

class InsumoEspecificoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('insumo_especifico')->delete();


        factory(InsumoEspecifico::class,10)->create();
    }
}
