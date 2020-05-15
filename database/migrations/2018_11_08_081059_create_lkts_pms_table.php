<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsPmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_pms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_users');
            $table->timestamp('pm_date_in');
            $table->text('pm_in');
            $table->timestamp('pm_date_out');
            $table->text('pm_out');
            $table->integer('status');
            $table->foreign('id_lkts_users')->references('id')->on('users');
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
        Schema::dropIfExists('lkts_pms');
    }
}
