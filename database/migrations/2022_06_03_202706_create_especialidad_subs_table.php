<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_subs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('especialidad_id')->index('fk_especialidad_sub_Idx1');
            $table->string('nombre', 3000);
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
        Schema::dropIfExists('especialidad_subs');
    }
}
