<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKeysToEspecialidadEspecialidadSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidad_especialidad_sub', function (Blueprint $table) {
            $table->foreign('especialidad_id', 'fk_especialidad_especiali_sub1')->references('id')->on('especialidades');
            $table->foreign('especialidad_sub_id', 'fk_especialidad_especiali_sub2')->references('id')->on('especialidad_subs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad_especialidad_sub', function (Blueprint $table) {
            $table->dropForeign('fk_especialidad_especiali_sub1');
            $table->dropForeign('fk_especialidad_especiali_sub2');
        });
    }
}
