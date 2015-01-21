<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescToProductCategories extends Migration {

	public function up() {
		Schema::table('product_categories', function($table)
		{
			$table->text('description')->nullable();
			$table->text('description_fr')->nullable();
		});
	}

}
