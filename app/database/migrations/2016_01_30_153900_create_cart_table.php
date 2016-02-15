<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('barcode');
			$table->integer('prod_id')->unsigned();
			$table->integer('qty');
			$table->double('total');
			$table->double('price');
			$table->integer('status');
			$table->foreign('prod_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cart');
	}

}
