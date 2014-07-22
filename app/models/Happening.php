<?php

class Happening extends Eloquent {

	public static $rules = array
	(
		'match_id' => 'required|integer',
		'minute' => 'required',
		'happening' => 'required',
		'description' => 'required',
	);

	public function match()
	{
		return $this->belongsTo('Match');
	}

}