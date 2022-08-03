<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFields2ToMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamentos', function (Blueprint $table) {
//            $table->string('reiniciar')->nullable();
//            $table->string('consideraciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamentos', function (Blueprint $table) {
            $table->dropColumn('reiniciar');
            $table->dropColumn('consideraciones');
        });
    }
}
