<?php

class Season extends Eloquent {

	public static $rules = array
	(
		'name' => 'required',
	);

	public function getFormattedStartDateAttribute()
	{
		return date('d.m.Y', strtotime($this->getAttribute('start_date')));
	}

	public function getFormattedEndDateAttribute()
	{
		return date('d.m.Y', strtotime($this->getAttribute('end_date')));
	}

	public function matches() 
	{
		return $this->hasMany('Match');
	}
}