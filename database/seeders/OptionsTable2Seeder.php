<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTable2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::firstOrCreate([
            'id' => 32,
            'option_id' => 15,
            'nombre' => 'Intervenciones News',
            'ruta' => 'intervencionesNews.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => 0,
            'color' => 'bg-teal',
            'dev' => 0,
            'created_at' => '2020-05-28 11:46:42',
            'updated_at' => '2020-05-28 11:51:32',
            'deleted_at' => NULL,
        ]);

        Option::firstOrCreate([
            'id' => 33,
            'option_id' => 15,
            'nombre' => 'Sub-Especialidad',
            'ruta' => 'especialidadSubs.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => 0,
            'color' => 'bg-teal',
            'dev' => 0,
            'created_at' => '2020-05-28 11:46:42',
            'updated_at' => '2020-05-28 11:51:32',
            'deleted_at' => NULL,
        ]);
    }
}
