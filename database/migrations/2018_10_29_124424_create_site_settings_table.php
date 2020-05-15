<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 191);
            $table->string('title', 191);
            $table->string('titlefull', 191);
            $table->string('titleinn', 191);
            $table->string('titlekpp', 191);
            $table->string('titlepochta', 191);
            $table->string('phone');
            $table->text('address');
            $table->text('metas');
            $table->text('counts');
            $table->string('copyright');
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
        Schema::dropIfExists('site_settings');
    }
}
