<?php

namespace Database\Seeders;

use App\Models\ContactoTipo;
use Illuminate\Database\Seeder;

class ContactoTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contacto_tipos')->delete();

        factory(ContactoTipo::class,1)->create(['nombre' => 'Casa']);
        factory(ContactoTipo::class,1)->create(['nombre' => 'Móvil']);
        factory(ContactoTipo::class,1)->create(['nombre' => 'Familiar']);
        factory(ContactoTipo::class,1)->create(['nombre' => 'Trabajo']);
        factory(ContactoTipo::class,1)->create(['nombre' => 'Cercano']);
        factory(ContactoTipo::class,1)->create(['nombre' => 'Llico']);

    }
}
