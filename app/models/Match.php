<?php

class Match extends Eloquent {

	public static $rules = array
	(
		'hometeam_id' => 'required|integer',
		'awayteam_id' => 'required|integer',
	);

	public function hometeam()
	{
		return $this->belongsTo('Team');
	}

	public function awayteam()
	{
		return $this->belongsTo('Team');
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