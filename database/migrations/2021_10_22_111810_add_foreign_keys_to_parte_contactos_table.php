<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_contactos', function (Blueprint $table) {
            $table->foreign('tipo_id', 'fk_parte_contactos1')->references('id')->on('contacto_tipos');
            $table->foreign('parte_id', 'fk_parte_contactos2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_contactos', function (Blueprint $table) {
            $table->dropForeign('fk_parte_contactos1');
            $table->dropForeign('fk_parte_contactos2');
        });
    }
}
