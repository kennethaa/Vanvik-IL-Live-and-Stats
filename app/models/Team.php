<?php

class Team extends Eloquent {

	public static $rules = array
	(
	);

	public function matches() 
	{
		return $this->hasMany('Match');
	}

}