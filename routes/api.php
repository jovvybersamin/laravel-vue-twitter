<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//Route::get('timeline', 'Api\Timeline\TimeLineController@index');
Route::post('tweets', 'Api\Tweets\TweetController@store');

Route::post('tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@store');
Route::delete('tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@destroy');

Route::post('tweets/{tweet}/retweets', 'Api\Tweets\TweetRetweetController@store');
Route::delete('tweets/{tweet}/retweets', 'Api\Tweets\TweetRetweetController@destroy');
