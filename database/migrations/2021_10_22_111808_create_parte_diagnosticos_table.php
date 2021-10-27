<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parte_id')->index('fk_parte_diagnosticosIdx1');
            $table->unsignedBigInteger('diagnostico_id')->index('fk_parte_diagnosticosIdx2');
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
        Schema::dropIfExists('parte_diagnosticos');
    }
}
