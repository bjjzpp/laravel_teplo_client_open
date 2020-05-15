<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fz_plan_id');
            $table->string('nfiles');
            $table->string('fpatch');
            $table->timestamp('fdata');
            $table->char('oldfile')->default(0);
            $table->foreign('fz_plan_id')->references('id')->on('fz_plans');
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
        Schema::dropIfExists('plan_files');
    }
}
