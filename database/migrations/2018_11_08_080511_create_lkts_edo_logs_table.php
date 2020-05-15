<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsEdoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_edo_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lkts_edo_id');
            $table->timestamp('log_date_in');
            $table->integer('status_log_id');
            $table->foreign('lkts_edo_id')->references('id')->on('lkts_edos');
            $table->foreign('status_log_id')->references('id')->on('lkts_status');
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
        Schema::dropIfExists('lkts_edo_logs');
    }
}
