<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank', 191);
            $table->string('bik', 191);
            $table->string('psh', 191);
            $table->string('ksh', 191);
            $table->char('default', 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spr_banks');
    }
}
