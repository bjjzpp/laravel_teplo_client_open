<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcoFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rco_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rco_id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->timestamp('dfiles');
            $table->foreign('rco_id')->references('id')->on('rcos');
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
        Schema::dropIfExists('rco_files');
    }
}
