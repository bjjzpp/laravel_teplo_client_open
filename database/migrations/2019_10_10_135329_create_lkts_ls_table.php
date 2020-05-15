<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLktsLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkts_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lkts_users');
            $table->integer('id_maps');
            $table->boolean('ls_user_active')->default(0);
            $table->string('ls',191)->unique();
            $table->string('ls_gis_gkx',191)->unique()->nullable();
            $table->string('lastname', 191)->nullable();
            $table->string('firstname', 191)->nullable();
            $table->string('middlename', 191)->nullable();
            $table->string('office', 4);
            $table->char('coun_people', 2)->nullable();
            $table->char('houseroom', 7)->nullable();
            $table->char('houseroom_non_resident', 7)->nullable();
            $table->char('houseroom_general', 7)->nullable();
            $table->foreign('id_lkts_users')->references('id')->on('users');
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
        Schema::dropIfExists('lkts_ls');
    }
}
