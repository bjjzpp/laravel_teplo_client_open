<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_ls');
            $table->string('title',191);
            $table->unsignedDecimal('debt', 8, 2);
            $table->unsignedDecimal('pay', 8, 2);
            $table->unsignedDecimal('charge', 8, 2);
            $ttable->char('payPeriod', 7);
            $table->boolean('flag_write')->default(0);
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
        Schema::dropIfExists('lkts_ls_charges');
    }
}
