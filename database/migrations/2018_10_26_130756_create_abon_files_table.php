<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abon_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('abon_id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->timestamp('dfiles');
            $table->foreign('abon_id')->references('id')->on('abons')->onDelete('cascade');
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
        Schema::dropIfExists('abon_files');
    }
}
