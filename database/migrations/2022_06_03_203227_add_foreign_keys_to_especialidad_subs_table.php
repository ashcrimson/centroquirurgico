<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEspecialidadSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidad_subs', function (Blueprint $table) {
            $table->foreign('especialidad_id', 'fk_especialidad_sub1')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad_subs', function (Blueprint $table) {
            $table->dropForeign('fk_especialidad_sub1');
        });
    }
}
