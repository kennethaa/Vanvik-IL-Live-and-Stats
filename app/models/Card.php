<?php

class Card extends Eloquent {

	public static $rules = array
	(
		'match_id' => 'required|integer',
		'minute' => 'required',
		'happening' => 'required',
		'player_id' => 'required',
	);

	public function match()
	{
		return $this->belongsTo('Match');
	}

	public function player()
	{
		return $this->belongsTo('Player');
	}

}