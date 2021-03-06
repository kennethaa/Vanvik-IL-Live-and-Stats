<?php

class Goal extends Eloquent {

	public static $rules = array
	(
		'match_id' => 'required|integer',
		'minute' => 'required',
	);

	public function match()
	{
		return $this->belongsTo('Match');
	}

	public function scorer()
	{
		return $this->belongsTo('Player');
	}

	public function assist()
	{
		return $this->belongsTo('Player');
	}

	public static function getMatchScore($match_id)
	{
		$homeScore = DB::table('goals')
			->where('match_id', '=', $match_id)
			->where('hometeam', '=', 1)
			->count();

		$awayScore = DB::table('goals')
			->where('match_id', '=', $match_id)
			->where('hometeam', '=', 0)
			->count();

		return  array(
			'hometeam_score' => $homeScore,
			'awayteam_score' => $awayScore
		);
	}

	public static function getGoalsInMatch($match_id)
	{
		$goals = DB::table('goals')
			->where('match_id', '=', $match_id)
			->orderBy('minute', 'desc')
			->get();

		foreach ($goals as $goalsKey => $value) {
			$goals[$goalsKey]->happening = 'goal';
		}

		return $goals;
	}

}