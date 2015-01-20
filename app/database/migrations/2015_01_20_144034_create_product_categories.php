<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategories extends Migration {

	public function up() {
		Schema::create('product_categories', function($table) {
			$table->increments('id');
			$table->string('category_name');
			$table->string('category_name_fr');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('product_categories');
	}

}
