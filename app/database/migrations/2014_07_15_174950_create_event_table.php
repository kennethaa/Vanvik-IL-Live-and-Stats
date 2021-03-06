<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('happenings', function($table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned();
			$table->integer('minute');
			$table->enum('happening', array('chance', 'comment', 'whistle', 'change'));
			$table->longText('description');
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
		Schema::drop('happenings');
	}

}
