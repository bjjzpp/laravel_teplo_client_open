<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeargoszaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeargoszaks', function (Blueprint $table) {
            $table->increments('id');
            $table->char('yearname');
            $table->char('flag')->default(0);
            $table->char('flag_balans')->default(0);
            $table->char('flag_fz')->default(0);
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
        Schema::dropIfExists('yeargoszaks');
    }
}
