<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->boolean('consentimiento_preop_anestesis')->nullable();
            $table->boolean('pase_preop_anestesista')->nullable();
            $table->string('indicaciones_preop_anestesista', 245)->nullable();

            $table->boolean('consentimiento_preop_medico')->nullable();
            $table->boolean('pase_preop_medico')->nullable();
            $table->string('indicaciones_preop_medico', 245)->nullable();

            $table->boolean('consentimiento_preop_eu')->nullable();
            $table->boolean('pase_preop_eu')->nullable();
            $table->string('indicaciones_preop_eu', 245)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->dropColumn('consentimiento_preop_anestesis');
            $table->dropColumn('pase_preop_anestesista');
            $table->dropColumn('indicaciones_preop_anestesista');
            $table->dropColumn('consentimiento_preop_medico');
            $table->dropColumn('pase_preop_medico');
            $table->dropColumn('indicaciones_preop_medico');
            $table->dropColumn('consentimiento_preop_eu');
            $table->dropColumn('pase_preop_eu');
            $table->dropColumn('indicaciones_preop_eu');
        });
    }
}
