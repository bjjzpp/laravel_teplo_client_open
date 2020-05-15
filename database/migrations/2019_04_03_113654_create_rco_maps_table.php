<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcoMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rco_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rco_id');
            $table->string('name', 191);
            $table->text('descriprion');
            $table->string('maps', 32);
            $table->timestamp('dfiles')->nullable();
            $table->foreign('rco_id')->references('id')->on('rcos');
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
        Schema::dropIfExists('rco_maps');
    }
}
