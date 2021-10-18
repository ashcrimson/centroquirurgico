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

        factory(CirugiaTipo::class,1)->create(['nombre' => 'Cirugía Mayor'])
            ->each(function (CirugiaTipo $cirugiaTipo){
                $cirugiaTipo->clasificaciones()->sync([1,2,3,4,5]);
            });
        factory(CirugiaTipo::class,1)->create(['nombre' => 'Cirugía Menor'])
            ->each(function (CirugiaTipo $cirugiaTipo){
                $cirugiaTipo->clasificaciones()->sync([1,2,3,4,5]);
            });
        factory(CirugiaTipo::class,1)->create(['nombre' => 'Urgencia'])
            ->each(function (CirugiaTipo $cirugiaTipo){
                $cirugiaTipo->clasificaciones()->sync([6,7,8,9,10]);
            });


    }
}
