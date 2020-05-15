<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsPuFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls_pu_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_ls_pus');
            $table->string('nfiles', 191);
            $table->string('pfiles', 191);
            $table->timestamp('dfiles');
            $table->foreign('id_lkts_ls_pus')->references('id')->on('lkts_ls_pus');
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
        Schema::dropIfExists('lkts_ls_pu_files');
    }
}
