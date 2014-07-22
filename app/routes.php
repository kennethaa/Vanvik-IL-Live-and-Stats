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

Route::get('/', 'HomeController@showWelcome');

Route::get('/api/v1/matches', 'APIv1@showMatches');
Route::get('/api/v1/players', 'APIv1@showPlayers');
Route::get('/api/v1/teams', 'APIv1@showTeams');
Route::get('/api/v1/seasons', 'APIv1@showSeasons');
Route::get('/api/v1/happenings', 'APIv1@showHappenings');