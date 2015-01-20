<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeyToProducts extends Migration {


	public function up() {
		Schema::table('products', function($table)
		{
			$table->index('category_id');
			$table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
		});
	}

	public function down() {

	}

}
