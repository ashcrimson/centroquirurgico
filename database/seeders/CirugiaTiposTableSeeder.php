<?php

namespace Database\Seeders;

use App\Models\CirugiaTipo;
use Illuminate\Database\Seeder;

class CirugiaTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('cirugia_tipos')->delete();

        factory(CirugiaTipo::class,10)->create();



    }
}
