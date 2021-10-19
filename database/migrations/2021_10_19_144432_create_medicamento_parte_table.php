<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoParteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_parte', function (Blueprint $table) {
            $table->unsignedBigInteger('medicamento_id')->index('fk_medicamento_partes_idx1');
            $table->unsignedBigInteger('parte_id')->index('fk_medicamento_parte_idx2');
            $table->primary(['medicamento_id', 'parte_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamento_parte');
    }
}
