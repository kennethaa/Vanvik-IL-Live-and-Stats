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

}