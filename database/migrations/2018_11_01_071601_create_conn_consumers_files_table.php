<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnConsumersFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conn_consumers_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conn_consumer_id');
            $table->string('nfiles');
            $table->string('pfiles');
            $table->string('dfiles');
            $table->foreign('conn_consumer_id')->references('id')->on('conn_consumers');
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
        Schema::dropIfExists('conn_consumers_files');
    }
}
