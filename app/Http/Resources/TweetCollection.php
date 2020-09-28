<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;


class TweetCollection extends ResourceCollection
{

    public $collects = TweetResource::class;


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    public function with($request)
    {

        return [
            'meta' => [
                'likes' => $this->likes($request),
                'retweets' => $this->retweets($request)
            ]
        ];
    }

    /**
     * Summary of likes
     *
     * @param mixed $request
     * @return mixed
     */
    public function likes($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()->whereIn(
            'tweet_id',
            $this->collection->pluck('id')
        )
            ->pluck('tweet_id')
            ->toArray();
    }

    /**
     * Summary of retweets
     *
     * @param mixed $request
     * @return mixed
     */
    public function retweets($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->retweets()
            ->whereIn('original_tweet_id', $this->collection->pluck('id'))
            ->pluck('original_tweet_id')
            ->toArray();
    }
}
