<?php

class Match extends Eloquent {

	public static $rules = array
	(
		'season_id' => 'required|integer',
		'hometeam_id' => 'required|integer',
		'awayteam_id' => 'required|integer',
	);

	public function season()
	{
		return $this->belongsTo('Season');
	}

	public function hometeam()
	{
		return $this->belongsTo('Team');
	}

	public function awayteam()
	{
		return $this->belongsTo('Team');
	}

	public function starting()
	{
		return $this->belongsToMany('Player', 'appearances_starting');
	}

	public function substitute()
	{
		return $this->belongsToMany('Player', 'appearances_sub');
	}

	public function star3()
	{
		return $this->belongsTo('Player');
	}

	public function star2()
	{
		return $this->belongsTo('Player');
	}

	public function star1()
	{
		return $this->belongsTo('Player');
	}

}