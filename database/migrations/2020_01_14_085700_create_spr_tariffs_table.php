<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr_tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_spr_usluga');
            $table->unsignedDecimal('tariff', 8, 2)->nullable();
            $table->boolean('flag_default')->default(0);
            $table->foreign('id_spr_usluga')->references('id')->on('spr_uslugas');
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
        Schema::dropIfExists('spr_tariffs');
    }
}
