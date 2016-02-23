<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletters extends Migration {

	public function up() {
		Schema::create('newsletters', function($table) {
			$table->increments('id');
			$table->string('article_title');
			$table->text('article_content');
			$table->string('image_name')->nullable();
			$table->text('newsletter');
			$table->integer('sent')->default(0);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('newsletters');
	}

}
