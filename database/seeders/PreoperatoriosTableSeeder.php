<?php

namespace Database\Seeders;

use App\Models\Preoperatorio;
use Illuminate\Database\Seeder;

class PreoperatoriosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('preoperatorios')->delete();

        factory(Preoperatorio::class,10)->create();

    }
}
