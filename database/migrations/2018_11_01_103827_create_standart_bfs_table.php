<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandartBfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standart_bfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('standart_type_id');
            $table->integer('year_id');
            $table->text('ztext');
            $table->foreign('standart_type_id')->references('id')->on('standart_types');
            $table->foreign('year_id')->references('id')->on('yeargoszaks');
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
        Schema::dropIfExists('standart_bfs');
    }
}
