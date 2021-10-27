<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_diagnosticos', function (Blueprint $table) {
            $table->foreign('diagnostico_id', 'fk_parte_diagnosticos1')->references('id')->on('diagnosticos');
            $table->foreign('parte_id', 'fk_parte_diagnosticos2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_diagnosticos', function (Blueprint $table) {
            $table->dropForeign('fk_parte_diagnosticos1');
            $table->dropForeign('fk_parte_diagnosticos2');
        });
    }
}
