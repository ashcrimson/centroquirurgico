<?php

namespace Database\Seeders;

use App\Models\ParteEstado;
use Illuminate\Database\Seeder;

class UpdateEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /**
         * @var ParteEstado $enviadoAdmision
         */
        $enviadoAdmision = ParteEstado::findOrFail(ParteEstado::ENVIADA_ADMICION);

        $enviadoAdmision->update([
            'nombre' => 'Enviado Admisión'
        ]);

    }
}
