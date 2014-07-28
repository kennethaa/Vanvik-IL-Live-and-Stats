'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/live', {templateUrl: 'partials/live.html', controller: 'Live'});
  $routeProvider.when('/spillerstall', {templateUrl: 'partials/spillerstall.html', controller: 'Spillerstall'});
  $routeProvider.otherwise({redirectTo: '/live'});
}]);
