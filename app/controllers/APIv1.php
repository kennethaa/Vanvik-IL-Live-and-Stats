<?php

class APIv1 extends BaseController {

	public function missingMethod($parameters = array())
	{
			header('Access-Control-Allow-Origin: *');

	    return 'Ingenting funnet!';
	}

	public function showMatches()
	{
		header('Access-Control-Allow-Origin: *');

		//Check if cache exsists
		if (Cache::has('show_matches'))
		{
			return Cache::get('show_matches');
		}

		$matches = Match::all();
		$players = Player::all();

		foreach ($matches as $key => $value) {
			
			foreach ($players as $playerKey => $playerValue) {
				if ($matches[$key]['star3_id'] == $players[$playerKey]['id']) {
					$matches[$key]['star3'] = $players[$playerKey]['name'];
				}
				if ($matches[$key]['star2_id'] == $players[$playerKey]['id']) {
					$matches[$key]['star2'] = $players[$playerKey]['name'];
				}
				if ($matches[$key]['star1_id'] == $players[$playerKey]['id']) {
					$matches[$key]['star1'] = $players[$playerKey]['name'];
				}
			}
		}

		$json = array(
			'matches' => $matches,
		);

		//Save in cache (60 minutes * 24 hours)
		Cache::put('show_matches', $json, 60);

		return $json;
	}

	public function showPlayers()
	{
		header('Access-Control-Allow-Origin: *');
		
		//Check if cache exsists
		if (Cache::has('show_players'))
		{
			return Cache::get('show_players');
		}

		$players = Player::getActivePlayers();
		$currentSeason = Season::getCurrentSeason();
		$ateamMatches = Match::getMatchesInSeason($currentSeason[0]->id, 'Vanvik');
		$bteamMatches = Match::getMatchesInSeason($currentSeason[0]->id, 'Vanvik 2');

		foreach ($ateamMatches as $matchKey => $matchValue) {
			$ateamMatches[$matchKey]->starting = Match::find($ateamMatches[$matchKey]->id)->starting;
			$ateamMatches[$matchKey]->substitute = Match::find($ateamMatches[$matchKey]->id)->substitute;
			$ateamMatches[$matchKey]->goals = Match::find($ateamMatches[$matchKey]->id)->goals;
			$ateamMatches[$matchKey]->cards = Match::find($ateamMatches[$matchKey]->id)->cards;
		}

		foreach ($bteamMatches as $matchKey => $matchValue) {
			$bteamMatches[$matchKey]->starting = Match::find($bteamMatches[$matchKey]->id)->starting;
			$bteamMatches[$matchKey]->substitute = Match::find($bteamMatches[$matchKey]->id)->substitute;
			$bteamMatches[$matchKey]->goals = Match::find($bteamMatches[$matchKey]->id)->goals;
			$bteamMatches[$matchKey]->cards = Match::find($bteamMatches[$matchKey]->id)->cards;
		}

		foreach ($players as $playerKey => $playerValue) {

			$ateam = new stdClass;
			$bteam = new stdClass;

			$ateam->starting = 0;
			$bteam->starting = 0;

			$ateam->sub = 0;
			$bteam->sub = 0;

			$ateam->goals = 0;
			$bteam->goals = 0;

			$ateam->assists = 0;
			$bteam->assists = 0;

			$ateam->points = 0;
			$bteam->points = 0;

			$ateam->yellow_cards = 0;
			$bteam->yellow_cards = 0;

			$ateam->yellowred_cards = 0;
			$bteam->yellowred_cards = 0;

			$ateam->red_cards = 0;
			$bteam->red_cards = 0;

			$ateam->stars = 0;
			$bteam->stars = 0;

			foreach ($ateamMatches as $matchKey => $matchValue) {
				//STARS
				if ($ateamMatches[$matchKey]->star3_id == $players[$playerKey]->id) {
					$ateam->stars = $ateam->stars + 3;
				}
				if ($ateamMatches[$matchKey]->star2_id == $players[$playerKey]->id) {
					$ateam->stars = $ateam->stars + 2;
				}
				if ($ateamMatches[$matchKey]->star1_id == $players[$playerKey]->id) {
					$ateam->stars++;
				}

				//STARTING
				foreach ($ateamMatches[$matchKey]->starting as $key => $value) {
					if ($ateamMatches[$matchKey]->starting[$key]->id == $players[$playerKey]->id) {
						$ateam->starting++;
					}
				}

				//SUBSTITUTE
				foreach ($ateamMatches[$matchKey]->substitute as $key => $value) {
					if ($ateamMatches[$matchKey]->substitute[$key]->id == $players[$playerKey]->id) {
						$ateam->sub++;
					}
				}

				//GOALS
				foreach ($ateamMatches[$matchKey]->goals as $key => $value) {
					if ($ateamMatches[$matchKey]->goals[$key]->scorer_id == $players[$playerKey]->id) {
						$ateam->goals++;
						$ateam->points = $ateam->points + 2;
					}
					if ($ateamMatches[$matchKey]->goals[$key]->assist_id == $players[$playerKey]->id) {
						$ateam->assists++;
						$ateam->points++;
					}
				}

				//CARDS
				foreach ($ateamMatches[$matchKey]->cards as $key => $value) {
					if ($ateamMatches[$matchKey]->cards[$key]->player_id == $players[$playerKey]->id) {
						if ($ateamMatches[$matchKey]->cards[$key]->happening == 'yellowcard') {
							$ateam->yellow_cards++;
						}
						if ($ateamMatches[$matchKey]->cards[$key]->happening == 'yellowredcard') {
							$ateam->yellowred_cards++;
						}
						if ($ateamMatches[$matchKey]->cards[$key]->happening == 'redcard') {
							$ateam->red_cards++;
						}
					}
				}
			}

			foreach ($bteamMatches as $matchKey => $matchValue) {
				//STARS
				if ($bteamMatches[$matchKey]->star3_id == $players[$playerKey]->id) {
					$bteam->stars = $bteam->stars + 3;
				}
				if ($bteamMatches[$matchKey]->star2_id == $players[$playerKey]->id) {
					$bteam->stars = $bteam->stars + 2;
				}
				if ($bteamMatches[$matchKey]->star1_id == $players[$playerKey]->id) {
					$bteam->stars++;
				}

				//STARTING
				foreach ($bteamMatches[$matchKey]->starting as $key => $value) {
					if ($bteamMatches[$matchKey]->starting[$key]->id == $players[$playerKey]->id) {
						$bteam->starting++;
					}
				}

				//SUBSTITUTE
				foreach ($bteamMatches[$matchKey]->substitute as $key => $value) {
					if ($bteamMatches[$matchKey]->substitute[$key]->id == $players[$playerKey]->id) {
						$bteam->sub++;
					}
				}

				//GOALS
				foreach ($bteamMatches[$matchKey]->goals as $key => $value) {
					if ($bteamMatches[$matchKey]->goals[$key]->scorer_id == $players[$playerKey]->id) {
						$bteam->goals++;
						$bteam->points = $bteam->points + 2;
					}
					if ($bteamMatches[$matchKey]->goals[$key]->assist_id == $players[$playerKey]->id) {
						$bteam->assists++;
						$bteam->points++;
					}
				}

				//CARDS
				foreach ($bteamMatches[$matchKey]->cards as $key => $value) {
					if ($bteamMatches[$matchKey]->cards[$key]->player_id == $players[$playerKey]->id) {
						if ($bteamMatches[$matchKey]->cards[$key]->happening == 'yellowcard') {
							$bteam->yellow_cards++;
						}
						if ($bteamMatches[$matchKey]->cards[$key]->happening == 'yellowredcard') {
							$bteam->yellowred_cards++;
						}
						if ($bteamMatches[$matchKey]->cards[$key]->happening == 'redcard') {
							$bteam->red_cards++;
						}
					}
				}
			}

			$players[$playerKey]->ateam = $ateam;
			$players[$playerKey]->bteam = $bteam;

		}

		$json = array(
			'players' => $players
		);

		//Save in cache (60 minutes * 24 hours)
		Cache::put('show_players', $json, 60 * 24);

		return $json;
	}

	public function showTeams()
	{
		header('Access-Control-Allow-Origin: *');

		$teams = Team::all();

		$json = array(
			'teams' => $teams,
		);
		return $json;
	}

	public function showSeasons()
	{
		header('Access-Control-Allow-Origin: *');

		$seasons = Season::all();

		$json = array(
			'seasons' => $seasons,
		);
		return $json;
	}

	public function showCurrentMatch()
	{
		header('Access-Control-Allow-Origin: *');

		$currentMatch = Match::getCurrentMatch();

		$json = array(
			'matchinfo' => $currentMatch,
		);
		return $json;
	}

	public function showLiveFeed($match_id = null)
	{
		header('Access-Control-Allow-Origin: *');

		if ($match_id == null) {
			$currentMatch = Match::getCurrentMatch();
		}
		else {
			$currentMatch = Match::getMatch($match_id);
		}

		if (!$currentMatch) {
			return array(
				'warning' => "Can't find any match with that id"
			);
		}

		$season = Season::getSeason($currentMatch[0]->season_id);
		$happenings = Happening::getHappeningsInMatch($currentMatch[0]->id);

		$players = Player::all();

		$goals = Goal::getGoalsInMatch($currentMatch[0]->id);
		foreach ($goals as $key => $value) {
			
			foreach ($players as $playerKey => $playerValue) {
				if ($goals[$key]->scorer_id == $players[$playerKey]['id']) {
					$goals[$key]->scorer = $players[$playerKey]['name'];
				}
				if ($goals[$key]->assist_id == $players[$playerKey]['id']) {
					$goals[$key]->assist = $players[$playerKey]['name'];
				}
			}
		}

		$cards = Card::getCardsInMatch($currentMatch[0]->id);
		foreach ($cards as $key => $value) {
			
			foreach ($players as $playerKey => $playerValue) {
				if ($cards[$key]->player_id == $players[$playerKey]['id']) {
					$cards[$key]->player = $players[$playerKey]['name'];
				}
			}
		}


		$happeningsGoalsCards = array_merge($happenings, $goals, $cards);

		usort($happeningsGoalsCards, function($a, $b) {
		    return $b->minute - $a->minute;
		});

		$matchScore = Goal::getMatchScore($currentMatch[0]->id);

		$starting = Match::find($currentMatch[0]->id)->starting->toArray();
		$substitute = Match::find($currentMatch[0]->id)->substitute->toArray();

		usort($starting, function($a, $b) {
		    return $a['number'] - $b['number'];
		});

		usort($substitute, function($a, $b) {
		    return $a['number'] - $b['number'];
		});

		$json = array(
			'match_id' => $match_id,
			'matchinfo' => $currentMatch,
			'season' => $season,
			'result' => $matchScore,
			'players' => array(
				'starting' => $starting,
				'substitute' => $substitute,
			),
			'happenings' => $happeningsGoalsCards
		);
		return $json;
	}

}
