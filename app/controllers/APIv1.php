<?php

class APIv1 extends BaseController {

	public function missingMethod($parameters = array())
	{
	    return 'Ingenting funnet!';
	}

	public function showMatches()
	{
		$matches = Match::all();
		$teams = Team::all();
		$players = Player::all();

		foreach ($matches as $key => $value) {
			//$matches[$key]['hometeam'] = getTeamName($matches[$key]['hometeam_id']);
			//$matches[$key]['awayteam'] = getTeamName($matches[$key]['awayteam_id']);

			foreach ($teams as $teamKey => $teamValue) {
				if ($matches[$key]['hometeam_id'] == $teams[$teamKey]['id']) {
					$matches[$key]['hometeam'] = $teams[$teamKey]['name'];
				}
				if ($matches[$key]['awayteam_id'] == $teams[$teamKey]['id']) {
					$matches[$key]['awayteam'] = $teams[$teamKey]['name'];
				}
			}

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
		return $json;
	}

	public function showPlayers()
	{
		$players = Player::all();

		$json = array(
			'players' => $players,
		);
		return $json;
	}

	public function showTeams()
	{
		$teams = Team::all();

		$json = array(
			'teams' => $teams,
		);
		return $json;
	}

	public function showSeasons()
	{
		$seasons = Season::all();

		$json = array(
			'seasons' => $seasons,
		);
		return $json;
	}

	public function showHappenings()
	{
		$happenings = Happening::all();

		$json = array(
			'happenings' => $happenings,
		);
		return $json;
	}

}
