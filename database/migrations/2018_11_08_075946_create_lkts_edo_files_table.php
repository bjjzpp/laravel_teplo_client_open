<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsEdoFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_edo_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->timestamp('dfiles');
            $table->integer('lkts_edo_files_id');
            $table->foreign('lkts_edo_files_id')->references('id')->on('lkts_edos');
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
        Schema::dropIfExists('lkts_edo_files');
    }
}
