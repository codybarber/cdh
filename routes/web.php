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
    return view('dashboard');
});
Route::get('/leaders', function () {
    return view('leaders/index');
});

/*
 * Routes for all of the teams related pages
 */
Route::get('/teams', function () {
    return view('teams/index');
});
Route::get('/teams/angels', function () {
   return view('teams/angels');
});
Route::get('/teams/bluejays', function () {
   return view('teams/bluejays');
});
Route::get('/teams/braves', function () {
   return view('teams/braves');
});
Route::get('/teams/brewers', function () {
   return view('teams/brewers');
});
Route::get('/teams/cubs', function () {
   return view('teams/cubs');
});
Route::get('/teams/dodgers', function () {
   return view('teams/dodgers');
});
Route::get('/teams/giants', function () {
   return view('teams/giants');
});
Route::get('/teams/indians', function () {
   return view('teams/indians');
});
Route::get('/teams/mariners', function () {
   return view('teams/mariners');
});
Route::get('/teams/marlins', function () {
   return view('teams/marlins');
});
Route::get('/teams/mets', function () {
   return view('teams/mets');
});
Route::get('/teams/orioles', function () {
   return view('teams/orioles');
});
Route::get('/teams/phillies', function () {
   return view('teams/phillies');
});
Route::get('/teams/pirates', function () {
   return view('teams/pirates');
});
Route::get('/teams/tigers', function () {
   return view('teams/tigers');
});
Route::get('/teams/yankees', function () {
   return view('teams/yankees');
});
