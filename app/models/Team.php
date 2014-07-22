<?php

class Team extends Eloquent {

	public static $rules = array
	(
		//'id' => 'unique:teams, id', //Does not work
		'id' => 'required|min:2',
	);

	public function matches() 
	{
		return $this->hasMany('Match');
	}

}