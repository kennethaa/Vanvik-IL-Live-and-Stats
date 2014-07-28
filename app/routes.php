<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// we dont need to use Laravel Blade
	// we will return a PHP file that will hold all of our Angular content
	// see the "Where to Place Angular Files" below to see ideas on how to structure your app
	return View::make('index'); // will return app/views/index.php
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api/v1'), function() {

	Route::get('matches', 'APIv1@showMatches');
	Route::get('players', 'APIv1@showPlayers');
	Route::get('teams', 'APIv1@showTeams');
	Route::get('seasons', 'APIv1@showSeasons');
	Route::get('happenings', 'APIv1@showHappenings');

});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});

