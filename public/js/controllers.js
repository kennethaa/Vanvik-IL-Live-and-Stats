'use strict';

/* Controllers */

function HeaderController($scope, $location) 
{ 
    $scope.isActive = function (viewLocation) { 
        return $location.path().indexOf(viewLocation) == 0;
    };
}

var hometeam_score, awayteam_score, interval;

angular.module('myApp.controllers', [])
  	.controller('Live', function($scope, $http, $routeParams, $location, $interval) {
	  	// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.warning = false;

		var match_id = $routeParams.match_id;
		var warning = false;

		if (!match_id) {
			$http.get('api/v1/live_feed_current_match').success(function(data) {
				$location.path('/live/' + data.matchinfo[0].id);
			});
		}

		var getLiveFeed = function(playSound) {
			$http.get('api/v1/live_feed/' + match_id).success(function(data) {
				if (data.warning) {
					$scope.warningMessage = data.warning;
					$scope.warning = true;
					warning = true;
					return;
				}
		    	$scope.happenings = data.happenings;
		    	$scope.season = data.season[0].name;
				$scope.matchinfo = data.matchinfo[0];
				$scope.starting = data.players.starting;
				$scope.substitute = data.players.substitute;
				$scope.result = data.result;

				if (playSound) {
					if (data.result.hometeam_score !== hometeam_score || data.result.awayteam_score !== awayteam_score) {
			    		hometeam_score = data.result.hometeam_score;
			    		awayteam_score = data.result.awayteam_score;

			    		if (hometeam_score > 0 || awayteam_score > 0) {
			    			//Play music
			    			//$('#pling')[0].play();
			    			soundManager.play('pling');

			    			//Render some effects with the score
			    			$('#score').fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow");
			    			//Render scoreboard
			    			$.bootstrapGrowl(hometeam_score + '-' + awayteam_score, {
			    				type: 'success',
			    				width: 100,
			    				delay: 10000,
		   						allow_dismiss: true
			    			});
			    		}
			    	}
				}
				else {
					$scope.loading = false;
					hometeam_score = data.result.hometeam_score;
		    		awayteam_score = data.result.awayteam_score;

					//DISQUS
					$scope.identifier = 'match-' + match_id;
					$scope.url = $location.absUrl();
				}
			});
		};

		getLiveFeed(false);

		//Interval
		$scope.stopFeed = function() {
			if (angular.isDefined(interval)) {
				$interval.cancel(interval);
				interval = undefined;
			}
		};

		interval = $interval(function() {
			if (!warning) {
		    	getLiveFeed(true);
		    }
		}, 10000);

		$scope.$on('$destroy', function() {
			// Make sure that the interval is destroyed too
			$scope.stopFeed();
		});

	})

  	.controller('Spillerstall', function($scope, $http) {
	  	// loading variable to show the spinning loading icon
		$scope.loading = true;
		
		$http.get('api/v1/players').success(function(data) {
			$scope.players = data.players;
			$scope.loading = false;
		});
  	});
