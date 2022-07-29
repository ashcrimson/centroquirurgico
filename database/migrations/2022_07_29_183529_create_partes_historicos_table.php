<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes_historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num_parte')->nullable();
            $table->bigInteger('rut')->nullable();
            $table->timestamp('fecha')->nullable();
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
        Schema::dropIfExists('partes_historicos');
    }
}
