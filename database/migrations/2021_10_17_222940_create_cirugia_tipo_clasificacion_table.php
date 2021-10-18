<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirugiaTipoClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirugia_tipo_clasificacion', function (Blueprint $table) {
            $table->unsignedBigInteger('cirugia_tipo_id')->index('cirugia_tipo_clasificacion_idx1');
            $table->unsignedBigInteger('clasificacion_id')->index('cirugia_tipo_clasificacion_idx2');
            $table->primary(['cirugia_tipo_id', 'clasificacion_id'],'pk_cirugia_tipo_clasificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cirugia_tipo_clasificacion');
    }
}
