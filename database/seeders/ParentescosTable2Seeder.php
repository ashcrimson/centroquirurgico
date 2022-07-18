<?php

namespace Database\Seeders;

use App\Models\Parentesco;
use Illuminate\Database\Seeder;

class ParentescosTable2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parentesco::firstOrCreate(['nombre' => 'Cónyuge']);
        Parentesco::firstOrCreate(['nombre' => 'Otro']);
    }
}
