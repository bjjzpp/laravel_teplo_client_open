<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsEdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_edos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_users');
            $table->timestamp('edo_date_in');
            $table->string('edo_name_object');
            $table->timestamp('edo_date_out');
            $table->text('edo_out');
            $table->integer('edo_frm')->nullable();
            $table->integer('edo_out_lk')->nullable();
            $table->integer('edo_out_close')->nullable();
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
        Schema::dropIfExists('lkts_edos');
    }
}
