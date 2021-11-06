<?php

namespace Database\Seeders;

use App\Models\Parentesco;
use Illuminate\Database\Seeder;

class ParentescosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('parentescos')->delete();

        \DB::table('parentescos')->insert(array (
            0 =>
            array (
                'id' => null,
                'nombre' => 'Pareja',
                'created_at' => '2021-11-06 11:38:09',
                'updated_at' => '2021-11-06 11:38:09',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => null,
                'nombre' => 'Hermano',
                'created_at' => '2021-11-06 11:38:19',
                'updated_at' => '2021-11-06 11:38:19',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => null,
                'nombre' => 'Hijo',
                'created_at' => '2021-11-06 11:38:37',
                'updated_at' => '2021-11-06 11:38:37',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => null,
                'nombre' => 'Nieto',
                'created_at' => '2021-11-06 11:38:44',
                'updated_at' => '2021-11-06 11:38:44',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => null,
                'nombre' => 'Padre',
                'created_at' => '2021-11-06 11:38:52',
                'updated_at' => '2021-11-06 11:38:52',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => null,
                'nombre' => 'Madre',
                'created_at' => '2021-11-06 11:38:59',
                'updated_at' => '2021-11-06 11:38:59',
                'deleted_at' => NULL,
            ),
        ));


    }
}
