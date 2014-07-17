<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function($table)
		{
			$table->increments('id');
			$table->integer('season_id')->unsigned();
			$table->integer('hometeam_id')->unsigned();
			$table->integer('awayteam_id')->unsigned();
			$table->datetime('start_time');
			$table->text('venue');
			$table->text('ref');
			$table->text('a_ref1');
			$table->text('a_ref2');
			$table->text('spectators');
			$table->integer('star3_id')->unsigned()->nullable();
			$table->integer('star2_id')->unsigned()->nullable();
			$table->integer('star1_id')->unsigned()->nullable();
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
		Schema::drop('matches');
	}

}
