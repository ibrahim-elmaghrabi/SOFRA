<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('address');
			$table->integer('client_id')->unsigned();
			$table->integer('restaurant_id')->unsigned();
			$table->integer('payment_method_id')->unsigned();
			$table->decimal('delivery_charge')->nullable();
			$table->decimal('commission')->default(0);
			$table->decimal('cost')->default(0);
			$table->decimal('net')->default(0);
			$table->decimal('total_cost')->default(0);
			$table->text('note')->nullable();
			$table->enum('state', array('pending', 'accepted', 'rejected', 'delivered', 'declined'))->default('pending');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}