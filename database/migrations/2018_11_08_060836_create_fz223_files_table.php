<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFz223FilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fz223_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goszak_id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->timestamp('dfiles');
            $table->char('oldfile')->default(0);
            $table->foreign('goszak_id')->references('id')->on('goszaks');
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
        Schema::dropIfExists('fz223_files');
    }
}
