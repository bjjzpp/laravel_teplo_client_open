<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsChargePrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls_charge_prints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_ls_charges');
            $table->integer('id_spr_uslugas');
            $table->unsignedDecimal('kolvo', 8, 2)->nullable();
            $table->unsignedDecimal('summa', 8, 2)->nullable();
            $table->foreign('id_lkts_ls_charges')->references('id')->on('lkts_ls_charges');
            $table->foreign('id_spr_uslugas')->references('id')->on('spr_uslugas');
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
        Schema::dropIfExists('lkts_ls_charge_prints');
    }
}
