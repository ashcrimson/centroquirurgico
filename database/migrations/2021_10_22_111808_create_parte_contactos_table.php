<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_contactos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id')->index('fk_parte_contactosIdx1');
            $table->unsignedBigInteger('parte_id')->index('fk_parte_contactosIdx2');
            $table->string('numero');
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
        Schema::dropIfExists('parte_contactos');
    }
}
