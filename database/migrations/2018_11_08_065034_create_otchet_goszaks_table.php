<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtchetGoszaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otchet_goszaks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id');
            $table->string('nameoth');
            $table->integer('fz_id');
            $table->foreign('year_id')->references('id')->on('yeargoszaks');
            $table->foreign('fz_id')->references('id')->on('fzs');
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
        Schema::dropIfExists('otchet_goszaks');
    }
}
