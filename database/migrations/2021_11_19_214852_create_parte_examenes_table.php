<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_examenes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('parte_id')->index('fk_parte_examenes_idx1');
            $table->unsignedBigInteger('examen_id')->index('fk_parte_examenes_idx2');
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
        Schema::dropIfExists('parte_examenes');
    }
}
