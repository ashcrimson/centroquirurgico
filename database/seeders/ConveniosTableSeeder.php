<?php

namespace Database\Seeders;

use App\Models\Convenio;
use Illuminate\Database\Seeder;

class ConveniosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('convenios')->delete();

        factory(Convenio::class,1)->create(['nombre' => 'Centro Láser']);
        factory(Convenio::class,1)->create(['nombre' => 'ISV']);


    }
}
