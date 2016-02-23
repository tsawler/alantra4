<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Newsletter extends Migration {

	public function up() {
		Schema::create('newsletters', function($table) {
			$table->increments('id');
			$table->string('article_title');
			$table->text('article_content');
			$table->string('image_name');
			$table->text('newsletter');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('newsletters');
	}

}
