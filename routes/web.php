<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('dailybuglanding');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// for all bugs
Route::get('/allbugs', 'BugController@index');

Route::get('/indivbug/{id}', 'BugController@showIndivBug');
// User Routes
// to show add bug form
Route::get('/addbug', 'BugController@create');

// to save
Route::post('/addbug', 'BugController@store');

// to show user bugs
Route::get('/mybug', 'BugController@indivBugs');

// to delete bug
Route::delete('/deletebug/{id}', 'BugController@destroy');

// to go to edit form
Route::get('/editbug/{id}', 'BugController@edit');

// to save edited bug
Route::patch('/editbug/{id}', 'BugController@update');

//To accept Solution
Route::patch('/accept/{id}', 'BugController@accept');
//Admin Routes
//To go to solve form
Route::get('/solve/{id}', 'BugController@showSolve');


//To save
Route::post('/solve', 'BugController@saveSolution');


//To Delete solution
Route::delete('/deletesolution/{id}', 'SolutionController@destroy');