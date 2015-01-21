<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToCategories extends Migration {

	public function up() {
		Schema::table('product_categories', function($table)
		{
			$table->string('slug')->nullable();
			$table->unique('category_name');

			$table->index('slug');
		});
	}

	public function down() {

	}

}
