<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		$this->call('TeamTableSeeder');
        $this->command->info('Team tables seeded!');

        $this->call('PlayerTableSeeder');
        $this->command->info('Player tables seeded!');

        $this->call('SeasonTableSeeder');
        $this->command->info('Season tables seeded!');
	}

}

class SeasonTableSeeder extends Seeder {
    public function run()
    {
        DB::table('seasons')->delete();

        Season::create(array(
        	'name' => '4. div avd 2',
        	'start_date' => '2014-01-01',
        	'end_date' => '2014-12-31',
        ));
    }
}

class PlayerTableSeeder extends Seeder {
    public function run()
    {
        DB::table('players')->delete();

        Player::create(array(
        	'number' => '26',
        	'position' => 'defender',
        	'name' => 'Kenneth Aasan',
        	'birth_date' => '1991-11-13',
        	'teams' => 'Stadsbygd IL'
        ));

        Player::create(array(
        	'number' => '8',
        	'position' => 'midtfielder',
        	'name' => 'Håkon Fjeldvær',
        	'birth_date' => '1991-09-18',
        	'teams' => 'Stadsbygd IL'
        ));

        Player::create(array(
        	'number' => '14',
        	'position' => 'midtfielder',
        	'name' => 'Martin Buaune Fjeldvær',
        	'birth_date' => '1993-04-07',
        	'teams' => ''
        ));
    }
}

class TeamTableSeeder extends Seeder {
    public function run()
    {
        DB::table('teams')->delete();

        Team::create(array('name' => 'Vanvik'));
        Team::create(array('name' => 'Vanvik 2'));
        Team::create(array('name' => 'Bjørgan'));
        Team::create(array('name' => 'Røros'));
        Team::create(array('name' => 'Kvik'));
        Team::create(array('name' => 'Meldal'));
        Team::create(array('name' => 'Stirndheim TF 2'));
        Team::create(array('name' => 'Flå'));
        Team::create(array('name' => 'Frøya'));
        Team::create(array('name' => 'Kil/Hemne 2'));
        Team::create(array('name' => 'Hitra'));
        Team::create(array('name' => 'Byneset'));
        Team::create(array('name' => 'Buvik 2'));
    }
}