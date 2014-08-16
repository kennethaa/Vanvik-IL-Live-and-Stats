'use strict';

/* Controllers */

function HeaderController($scope, $location) 
{ 
    $scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
}

angular.module('myApp.controllers', [])
  .controller('Live', function($scope, $http) {
  	// loading variable to show the spinning loading icon
	$scope.loading = true;
	
	$http.get('api/v1/live_feed').success(function(data) {
		$scope.happenings = data.happenings;
		$scope.matchinfo = data.matchinfo[0];
		$scope.starting = data.players.starting;
		$scope.substitute = data.players.substitute;
		$scope.loading = false;
	});
	var home_score, away_score;
	var getResult = function() {
		$http.get('api/v1/live_feed_result').success(function(data) {
	    	if (data.result.home_score !== home_score || data.result.away_score !== away_score) {
	    		$scope.result = data.result;

	    		home_score = data.result.home_score;
	    		away_score = data.result.away_score;

	    		console.log('Resultatskifte');

	    		
	    	}
		});
	};

	getResult();
	setInterval(function() {
	    getResult();
	}, 5000);

  })
  .controller('Spillerstall', function($scope, $http) {
  	// loading variable to show the spinning loading icon
	$scope.loading = true;
	
	$http.get('api/v1/players').success(function(data) {
		$scope.players = data.players;
		$scope.loading = false;
	});

  });
