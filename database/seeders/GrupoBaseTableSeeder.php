<?php

namespace Database\Seeders;

use App\Models\GrupoBase;
use Illuminate\Database\Seeder;

class GrupoBaseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('grupo_base')->delete();

        factory(GrupoBase::class,10)->create();

    }
}
