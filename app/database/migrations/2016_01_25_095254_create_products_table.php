<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table){
			
			$table->increments('id');
			$table->string('barcode');
			$table->string('product_name');
			$table->string('product_image');
			$table->string('product_description');
			$table->integer('category_id')->unsigned();
			$table->timestamps();
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
