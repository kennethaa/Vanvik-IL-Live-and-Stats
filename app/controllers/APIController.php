<?php

class APIController extends BaseController {


	public function getMatches()
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
			'season' => 'Sesong 14',
			'matches' => $matches,
		);
		return $json;
	}

}
