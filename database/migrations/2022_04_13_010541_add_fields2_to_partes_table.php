<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFields2ToPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->tinyInteger('control_banco_sangre')->nullable();
            $table->dateTime('fecha_banco_sangre')->nullable();
            $table->dateTime('fecha_banco_sangre_valida')->nullable();
            $table->integer('cantidad_donantes')->nullable();
            $table->boolean('pase_banco_sagre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->dropColumn('control_banco_sangre');
            $table->dropColumn('fecha_banco_sangre');
            $table->dropColumn('fecha_banco_sangre_valida');
            $table->dropColumn('cantidad_donantes');
            $table->dropColumn('pase_banco_sagre');
        });
    }
}
