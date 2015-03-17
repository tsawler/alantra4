<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subscribers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('subscribers', function($table) {
            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('subscribers');
    }

}
