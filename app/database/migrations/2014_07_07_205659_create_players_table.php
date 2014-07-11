<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function($table)
		{
			$table->increments('id');
			$table->integer('number');
			$table->enum('position', array('goalkeeper', 'defender', 'midtfielder', 'striker'));
			$table->text('name');
			$table->date('birth_date');
			$table->text('teams');
			$table->text('image');
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
		Schema::drop('players');
	}

}