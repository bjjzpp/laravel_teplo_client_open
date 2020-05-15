<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoszaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goszaks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typegoszak_id');
            $table->integer('goszak_types_id');
            $table->integer('year_id');
            $table->integer('etorg_id');
            $table->string('numzak')->nullable();
            $table->string('etorg_num')->nullable();
            $table->string('doczak')->nullable();
            $table->text('ztext');
            $table->timestamp('databegin');
            $table->timestamp('dataend');
            $table->timestamp('datacomm');
            $table->integer('fz_id');
            $table->foreign('goszak_id')->references('id')->on('goszaks');
            $table->foreign('year_id')->references('id')->on('yeargoszaks');
            $table->foreign('fz_id')->references('id')->on('fzs');
            $table->foreign('typegoszak_id')->references('id')->on('typegoszaks');
            $table->foreign('goszak_types_id')->references('id')->on('goszak_types');
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
        Schema::dropIfExists('goszaks');
    }
}
