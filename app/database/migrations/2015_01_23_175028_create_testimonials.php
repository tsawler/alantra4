<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonials extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function ($table)
        {
            $table->increments('id');
            $table->string('testimonial_name');
            $table->string('person');
            $table->string('company');
            $table->text('testimonial');
            $table->date('testimonial_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('testimonials');
    }

}
