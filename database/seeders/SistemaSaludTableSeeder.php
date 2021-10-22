<?php

namespace Database\Seeders;

use App\Models\SistemaSalud;
use Illuminate\Database\Seeder;

class SistemaSaludTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sistema_salud')->delete();


        factory(SistemaSalud::class,10)->create();
    }
}
