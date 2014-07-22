<?php

class Match extends Eloquent {

	public static $rules = array
	(
		'season_id' => 'required|integer',
		'hometeam_id' => 'required',
		'awayteam_id' => 'required',
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

	//Events

	public function getMatchNameAttribute()
	{
		return $this->getAttribute('hometeam_id').' - '.$this->getAttribute('awayteam_id');
	}

	public function events() 
	{
		return $this->hasMany('Event');
	}

	public function goals() 
	{
		return $this->hasMany('Goal');
	}

	public function cards() 
	{
		return $this->hasMany('Card');
	}

}