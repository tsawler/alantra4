<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	public function up() {
		Schema::create('contacts', function($table) {
			$table->increments('id');
			$table->string('full_name');
			$table->string('email');
			$table->string('subject')->nullable();
			$table->text('message');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('contacts');
	}

}
