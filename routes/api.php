<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api->version('v1', function ($api)
{
	$api->group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\ApiV1'], function($api)
	    {
    	// $api->post('/play', 'PlayController@new')->name('api.play');
    	$api->get('/draw', function() {
    		return;
    	})->name('api.draw');
    	$api->get('/draw/{draw_id}', 'PlayController@getDraw')->name('api.getDraw');
    	$api->post('/draw/{draw_id}', 'PlayController@updateDraw')->name('api.updateDraw');
    	// $api->get('/play/{player_id}', 'PlayController@getDraws')->name('api.getDraws');
	});
});