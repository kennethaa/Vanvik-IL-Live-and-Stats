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

        $this->call('MatchTableSeeder');
        $this->command->info('Match tables seeded!');
	}

}

class MatchTableSeeder extends Seeder {
    public function run()
    {
        DB::table('matches')->delete();

        Match::create(array(
        	'season_id' => '1',
        	'hometeam_id' => 'Vanvik',
        	'awayteam_id' => 'Bjørgan',
        	'start_time' => '2014-07-22 18:00',
        	'venue' => 'Skavelmyra Stadion',
        	'ref' => 'Joachim Dalum',
        	'a_ref1' => 'Helseth',
        	'a_ref2' => 'Dyrvik',
        	'spectators' => '100'
        ));
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

        Team::create(array('id' => 'Vanvik'));
        Team::create(array('id' => 'Vanvik 2'));
        Team::create(array('id' => 'Bjørgan'));
        Team::create(array('id' => 'Røros'));
        Team::create(array('id' => 'Kvik'));
        Team::create(array('id' => 'Meldal'));
        Team::create(array('id' => 'Strindheim TF 2'));
        Team::create(array('id' => 'Flå'));
        Team::create(array('id' => 'Frøya'));
        Team::create(array('id' => 'Kil/Hemne 2'));
        Team::create(array('id' => 'Hitra'));
        Team::create(array('id' => 'Byneset'));
        Team::create(array('id' => 'Buvik 2'));
    }
}