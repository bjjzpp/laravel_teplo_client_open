<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('faq_in_date');
            $table->string('person');
            $table->string('person_email');
            $table->text('faq_in_text');
            $table->timestamp('faq_out_date');
            $table->text('faq_out_text');
            $table->string('faq_out_ts');
            $table->char('status')->default(0);
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
        Schema::dropIfExists('person_faqs');
    }
}
