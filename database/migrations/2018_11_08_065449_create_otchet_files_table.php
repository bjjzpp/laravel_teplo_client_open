<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtchetFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otchet_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('otchet_gz_id');
            $table->string('fpatch');
            $table->timestamp('dfiles');
            $table->char('oldfile')->default(0);
            $table->foreign('otchet_gz_id')->references('id')->on('otchet_goszaks');
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
        Schema::dropIfExists('otchet_files');
    }
}
