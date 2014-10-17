<?php

class Card extends Eloquent {

	public static $rules = array
	(
		'match_id' => 'required|integer',
		'minute' => 'required',
		'happening' => 'required',
	);

	public function match()
	{
		return $this->belongsTo('Match');
	}

	public function player()
	{
		return $this->belongsTo('Player');
	}

	public static function getCardsInMatch($match_id)
	{
		$cards = DB::table('cards')
			->where('match_id', '=', $match_id)
			->orderBy('minute', 'desc')
			->get();

		return $cards;
	}

}