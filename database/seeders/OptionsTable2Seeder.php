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

        Option::firstOrCreate([
            'id' => 34,
            'option_id' => 15,
            'nombre' => 'Parentesco',
            'ruta' => 'parentescos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => 0,
            'color' => 'bg-teal',
            'dev' => 0,
            'created_at' => '2020-07-25 11:21:00',
            'updated_at' => '2020-07-25 11:21:00',
            'deleted_at' => NULL,
        ]);

        Option::firstOrCreate([
            'id' => 35,
            'option_id' => NULL,
            'nombre' => 'Mis Partes',
            'ruta' => 'partes.mis.partes',
            'descripcion' => NULL,
            'icono_l' => 'fa-list',
            'icono_r' => NULL,
            'orden' => 0,
            'color' => 'bg-teal',
            'dev' => 0,
            'created_at' => '2020-07-27 11:36:15',
            'updated_at' => '2020-07-27 11:36:15',
            'deleted_at' => NULL,
        ]);
    }
}
