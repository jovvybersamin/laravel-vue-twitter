<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetLikesWereUpdated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tweet;

class TweetLikeController extends Controller
{

    /**
     * Summary of store
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return mixed
     */
    public function store(Tweet $tweet, Request $request)
    {
        if ($request->user()->hasLiked($tweet)) {
            return response(null, 409); // conflict
        }


        $request->user()->likes()->create(['tweet_id' => $tweet->id]);

        broadcast(new TweetLikesWereUpdated($request->user(), $tweet));
    }

    /**
     * Summary of destroy
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return mixed
     */
    public function destroy(Tweet $tweet, Request $request)
    {
        $request->user()->likes()->where('tweet_id', $tweet->id)->first()->delete();

        broadcast(new TweetLikesWereUpdated($request->user(), $tweet));
    }
}
