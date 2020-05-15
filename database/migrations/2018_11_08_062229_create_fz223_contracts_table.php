<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFz223ContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fz223_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goszak_id');
            $table->string('lot');
            $table->string('link_lot');
            $table->timestamp('databegin'); 	
            $table->integer('fz_id');
            $table->foreign('goszak_id')->references('id')->on('goszaks');
            $table->foreign('fz_id')->references('id')->on('fzs');
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
        Schema::dropIfExists('fz223_contracts');
    }
}
