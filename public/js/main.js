var VanvikUtil = {

	removeNotPlayingPlayers: function(players, team) {
		var playingPlayers = [];
		for (var i = 0; i < players.length; i++) {
			if (players[i][team].starting > 0 || players[i][team].sub > 0) {
				playingPlayers.push(players[i]);
			}
		}
		return playingPlayers;
	},

	filterPlayers: function(players, position) {
		var filteredPlayers = [];
		for (var i = 0; i < players.length; i++) {
			if (players[i].position == position) {
				filteredPlayers.push(players[i]);
			}
		}
		return filteredPlayers;
	},

	generateTopPlayers: function(players, team, element) {
		players.sort(function(a, b) {
			return b[team][element] - a[team][element];
		});

		players = players.slice(0, 5);

		return players;
	}
}