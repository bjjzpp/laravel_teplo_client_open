<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTchemaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tchema_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tchema_id');
            $table->string('fname');
            $table->string('fpatch');
            $table->timestamp('fdata');
            $table->foreign('tchema_id')->references('id')->on('tchemas');
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
        Schema::dropIfExists('tchema_files');
    }
}
