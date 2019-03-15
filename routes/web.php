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
    return view('welcome');
});

Route::get('/home', function () {
    return Redirect::to('dashboard');
});

Auth::routes();

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::match(['get', 'post'], 'password/reset', function(){
    return redirect('/');
});

Route::match(['get', 'post'], 'password/reset', function(){
    return redirect('/');
});

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {
		Route::get('/', 'PrizeController@index')->name('home');

		//prizes 
		Route::get('/prizes', 'PrizeController@index')->name('prizes');
		Route::post('/prizes', 'PrizeController@store')->name('prize_add');
		Route::get('/prizes/{id}', 'PrizeController@detail')->name('prize_detail');
		Route::put('/prizes/{id}', 'PrizeController@update')->name('prize_edit');
		Route::get('/prizes/{id}/delete', 'PrizeController@delete')->name('prize_delete');
		Route::get('/prizescalc', 'PrizeController@prizesCalc')->name('prizes_calc');

		//players 
		Route::get('/players', 'PlayerController@index')->name('players');
		Route::post('/players', 'PlayerController@store')->name('player_add');
		Route::get('/players/{id}', 'PlayerController@detail')->name('player_detail');
		Route::put('/players/{id}', 'PlayerController@update')->name('player_edit');
		Route::get('/players/{id}/delete', 'PlayerController@delete')->name('player_delete');
		Route::get('/players/{id}/claimed', 'PlayerController@claimPrizes')->name('player_claim');
		Route::get('/players/{drawId}/draw/delete', 'PlayerController@deleteDraw')->name('player_delete_draw');

		//players 
		Route::get('/schedules', 'ScheduleController@index')->name('schedules');
		Route::post('/schedules', 'ScheduleController@store')->name('schedule_add');
		Route::get('/schedules/{id}', 'ScheduleController@detail')->name('schedule_detail');
		Route::put('/schedules/{id}', 'ScheduleController@update')->name('schedule_edit');
		Route::get('/schedules/{id}/delete', 'ScheduleController@delete')->name('schedule_delete');
	}
);

Route::group(['prefix' => 'play'],function () { 

	Route::get('/', function() {
		$data['class'] = "home";
		return view('pages.play.home', $data);
	})->name('play.home');
	Route::get('/start', function() {
		$data['class'] = "form";
		return view('pages.play.start', $data);
	})->name('play.start');

    Route::post('/new', 'ApiV1\PlayController@new')->name('play.new');
    Route::get('/start/{user_id}/draw', 'ApiV1\PlayController@getPlayerDraw')->name('play.draw');
    Route::get('/start/{user_id}/congrats', 'ApiV1\PlayController@getCongrats')->name('play.congrats');
    Route::get('/start/{user_id}/thanks', 'ApiV1\PlayController@getThanks')->name('play.thanks');

});


