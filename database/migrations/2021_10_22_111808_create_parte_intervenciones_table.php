<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteIntervencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_intervenciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parte_id')->index('fk_parte_intervencionesIdx1');
            $table->unsignedBigInteger('intervencion_id')->index('fk_parte_intervencionesIdx2');
            $table->string('lateralidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parte_intervenciones');
    }
}
