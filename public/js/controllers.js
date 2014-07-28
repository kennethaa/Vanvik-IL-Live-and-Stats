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
	
	$http.get('api/v1/happenings').success(function(data) {
		$scope.happenings = data.happenings;
		$scope.loading = false;
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
