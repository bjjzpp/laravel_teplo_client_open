<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_lkts_ls');
            $table->string('pin', 7);
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_lkts_ls')->references('id')->on('lkts_ls');
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
        Schema::dropIfExists('users_ls');
    }
}
