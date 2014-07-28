<?php

class APIv1 extends BaseController {

	public function missingMethod($parameters = array())
	{
	    return 'Ingenting funnet!';
	}

	public function showMatches()
	{
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
		return $json;
	}

	public function showPlayers()
	{
		$players = Player::getActivePlayers();
		$currentSeason = Season::getCurrentSeason();
		$ateamMatches = Match::getMatchesInSeason($currentSeason[0]->id, 'Vanvik');
		$bteamMatches = Match::getMatchesInSeason($currentSeason[0]->id, 'Vanvik 2');

		foreach ($players as $playerKey => $playerValue) {

			$ateam_stars = 0;
			$bteam_stars = 0;

			foreach ($ateamMatches as $matchKey => $matchValue) {
				if ($ateamMatches[$matchKey]->star3_id == $players[$playerKey]->id) {
					$ateam_stars = $ateam_stars + 3;
				}
				if ($ateamMatches[$matchKey]->star2_id == $players[$playerKey]->id) {
					$ateam_stars = $ateam_stars + 2;
				}
				if ($ateamMatches[$matchKey]->star1_id == $players[$playerKey]->id) {
					$ateam_stars++;
				}
			}

			foreach ($bteamMatches as $matchKey => $matchValue) {
				if ($bteamMatches[$matchKey]->star3_id == $players[$playerKey]->id) {
					$bteam_stars = $bteam_stars + 3;
				}
				if ($bteamMatches[$matchKey]->star2_id == $players[$playerKey]->id) {
					$bteam_stars = $bteam_stars + 2;
				}
				if ($bteamMatches[$matchKey]->star1_id == $players[$playerKey]->id) {
					$bteam_stars++;
				}
			}

			$players[$playerKey]->ateam_stars = $ateam_stars;
			$players[$playerKey]->bteam_stars = $bteam_stars;

		}

		$json = array(
			'players' => $players,
			'current_season' => $currentSeason,
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
