<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetRetweetController extends Controller
{
    /**
     *
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return void
     */
    public function store(Tweet $tweet, Request $request)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'body' => '',
            'original_tweet_id' => $tweet->id
        ]);
    }

    /**
     * Summary of destroy
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return void
     */
    public function destroy(Tweet $tweet, Request $request)
    {
    }
}
