<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEspecialidadUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidad_user', function (Blueprint $table) {
            $table->foreign('especialidad_id', 'fk_especialidad_user1')->references('id')->on('especialidades');
            $table->foreign('user_id', 'fk_especialidad_user2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad_user', function (Blueprint $table) {
            $table->dropForeign('fk_especialidad_user1');
            $table->dropForeign('fk_especialidad_user2');
        });
    }
}
