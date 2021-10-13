<?php

namespace Database\Seeders;

use App\Models\Pabellon;
use Illuminate\Database\Seeder;

class PabellonesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pabellones')->delete();

        factory(Pabellon::class,10)->create();

    }
}
