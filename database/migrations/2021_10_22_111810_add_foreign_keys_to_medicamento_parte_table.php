<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMedicamentoParteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamento_parte', function (Blueprint $table) {
            $table->foreign('medicamento_id', 'fk_medicamentos_parte1')->references('id')->on('medicamentos');
            $table->foreign('parte_id', 'fk_medicamentos_parte2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamento_parte', function (Blueprint $table) {
            $table->dropForeign('fk_medicamentos_parte1');
            $table->dropForeign('fk_medicamentos_parte2');
        });
    }
}
