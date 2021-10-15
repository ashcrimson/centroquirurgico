<?php

namespace Database\Seeders;

use App\Models\Diagnostico;
use Illuminate\Database\Seeder;

class DiagnosticosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('diagnosticos')->delete();

        factory(Diagnostico::class,10)->create();

    }
}
