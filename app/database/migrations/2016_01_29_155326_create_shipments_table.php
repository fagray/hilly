<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipments', function(Blueprint $table){

			$table->increments('id');
			$table->integer('supplier_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity');
			$table->string('delivered_by');
			$table->timestamps();
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shipments');
	}

}
