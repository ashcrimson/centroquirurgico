<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadEspecialidadSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_especialidad_sub', function (Blueprint $table) {
            $table->unsignedBigInteger('especialidad_id')->index('especiali_especiali_sub_idx1');
            $table->unsignedBigInteger('especialidad_sub_id')->index('especiali_especiali_sub_idx2');
            $table->primary(['especialidad_id','especialidad_sub_id'], 'pk_especiali_especiali_sub');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidad_especialidad_sub');
    }
}
