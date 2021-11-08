<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parte_id')->index('fk_parte_medicamentos_idx');
            $table->unsignedBigInteger('medicamento_id')->index('fk_parte_medicamentos1_idx');
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
        Schema::dropIfExists('parte_medicamentos');
    }
}
