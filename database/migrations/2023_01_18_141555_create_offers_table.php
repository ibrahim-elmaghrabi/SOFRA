<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('restaurant_id');
			$table->text('offer');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('image');
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}