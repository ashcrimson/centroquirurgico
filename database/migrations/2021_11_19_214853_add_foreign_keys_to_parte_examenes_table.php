<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_examenes', function (Blueprint $table) {
            $table->foreign('examen_id', 'fk_parte_examenes1')->references('id')->on('examenes');
            $table->foreign('parte_id', 'fk_parte_examenes2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_examenes', function (Blueprint $table) {
            $table->dropForeign('fk_parte_examenes1');
            $table->dropForeign('fk_parte_examenes2');
        });
    }
}
