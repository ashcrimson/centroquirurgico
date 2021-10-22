<?php

namespace Database\Seeders;

use App\Models\Reparticion;
use Illuminate\Database\Seeder;

class ReparticionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('reparticiones')->delete();

        factory(Reparticion::class,10)->create();

    }
}
