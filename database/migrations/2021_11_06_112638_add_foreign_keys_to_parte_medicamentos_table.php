<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_medicamentos', function (Blueprint $table) {
            $table->foreign('medicamento_id', 'fk_parte_medicamentos1')->references('id')->on('medicamentos');
            $table->foreign('parte_id', 'fk_parte_medicamentos2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_medicamentos', function (Blueprint $table) {
            $table->dropForeign('fk_parte_medicamentos1');
            $table->dropForeign('fk_parte_medicamentos2');
        });
    }
}
