<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsNormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls_norms', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('id_lkts_ls');
            $table->integer('id_spr_usluga');
            $table->unsignedDecimal('norm', 8, 4)->nullable();
            $table->foreign('id_lkts_ls')->references('id')->on('lkts_ls');
            $table->foreign('id_spr_usluga')->references('id')->on('spr_uslugas');
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
        Schema::dropIfExists('lkts_ls_norms');
    }
}
