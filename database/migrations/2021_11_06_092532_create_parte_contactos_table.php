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
            $table->unsignedBigInteger('tipo_id')->nullable()->index('fk_parte_contacto_tipos1_idx');
            $table->unsignedBigInteger('parte_id')->index('fk_parte_contactos_partes1_idx');
            $table->unsignedBigInteger('parentesco_id')->index('fk_parte_contacto_parents1_idx');
            $table->string('nombre');
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
