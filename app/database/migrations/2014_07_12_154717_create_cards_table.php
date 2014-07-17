<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function($table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned();
			$table->integer('minute');
			$table->enum('event', array('yellowcard', 'yellowredcard', 'redcard'));
			$table->integer('player_id')->unsigned()->nullable();
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
		Schema::drop('cards');
	}

}
