<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goals', function($table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned();
			$table->integer('minute');
			$table->integer('scorer_id')->unsigned()->nullable();
			$table->integer('assist_id')->unsigned()->nullable();
			$table->boolean('hometeam'); //Hometeam or Awayteam
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
		Schema::drop('goals');
	}

}
