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
            $table->foreign('especialidade_id', 'fk_especialidades_has_users_especialidades1')->references('id')->on('especialidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_especialidades_has_users_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_especialidades_has_users_especialidades1');
            $table->dropForeign('fk_especialidades_has_users_users1');
        });
    }
}
