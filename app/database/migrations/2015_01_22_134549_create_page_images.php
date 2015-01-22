<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageImages extends Migration {

	public function up() {
		Schema::create('page_images', function($table) {
			$table->increments('id');
			$table->integer('page_id');
			$table->string('image_name');
			$table->timestamps();

			$table->index('page_id');
			$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade')->onUpdate('cascade');

		});
	}

	public function down() {
		Schema::drop('page_images');
	}

}
