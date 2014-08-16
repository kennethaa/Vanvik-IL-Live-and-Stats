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

	public static function getHappeningsInMatch($match_id)
	{
		$happenings = DB::table('happenings')
			->where('match_id', '=', $match_id)
			->orderBy('minute', 'desc')
			->get();

		return $happenings;
	}

}