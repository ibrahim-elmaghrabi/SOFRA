<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->decimal('delivery_charge');
			$table->decimal('minimum_order');
			$table->integer('area_id')->unsigned();
			$table->string('password');
			$table->string('delivery_phone');
			$table->string('delivery_whatsapp');
			$table->string('image');
			$table->time('open_at');
			$table->time('close_at');
			$table->boolean('active')->default(0);
			$table->string('pin_code')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}