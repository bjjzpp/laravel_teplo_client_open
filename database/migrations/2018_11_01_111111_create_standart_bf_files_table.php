<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandartBfFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standart_bf_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('standart_bf_id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->timestamp('dfiles');
            $table->foreign('standart_bf_id')->references('id')->on('standart_bfs');
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
        Schema::dropIfExists('standart_bf_files');
    }
}
