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

        \DB::table('cirugia_tipos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombre' => 'Cirugía Mayor',
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2020-08-26 11:51:32',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'nombre' => 'Cirugía Menor',
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'nombre' => 'Urgencia',
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),

        ));



    }
}
