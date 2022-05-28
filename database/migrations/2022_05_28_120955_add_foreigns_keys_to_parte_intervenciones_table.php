<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsKeysToParteIntervencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_intervenciones', function (Blueprint $table) {
            $table->foreign('intervencion_new_id', 'fk_parte_intervenciones3')->references('id')->on('intervenciones_new');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_intervenciones', function (Blueprint $table) {
            $table->dropForeign('fk_parte_intervenciones3');
        });
    }
}
