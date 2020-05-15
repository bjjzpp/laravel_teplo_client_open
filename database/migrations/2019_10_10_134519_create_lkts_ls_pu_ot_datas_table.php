<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsPuOtDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls_pu_ot_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_ls_puots');
            $table->integer('id_lkts_ls_pus');
            $table->string('pu_data', 191);
            $table->text('pu_comm_del');
            $table->foreign('id_lkts_ls_puots')->references('id')->on('lkts_ls_puots');
            $table->foreign('id_lkts_ls_pus')->references('id')->on('lkts_ls');
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
        Schema::dropIfExists('lkts_ls_pu_ot_datas');
    }
}
