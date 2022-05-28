<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToParteIntervencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_intervenciones', function (Blueprint $table) {
            $table->unsignedBigInteger('intervencion_new_id')->index('fk_parte_intervencionesIdx3')->nullable();
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
            $table->dropColumn('intervencion_new_id');
        });
    }
}
