<?php

namespace App\Events\Tweets;

use App\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;

class TweetLikesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Summary of
     * @var mixed
     */
    private $tweet = null;

    /**
     * Summary of
     * @var mixed
     */
    private $user = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Tweet $tweet)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }
    /**
     * Summary of broadcastWith
     *
     * @return string
     */
    public function broadcastWith()
    {
        return [
            'tweet_id' => $this->tweet->id,
            'user_id' => $this->user->id,
            'count' => $this->user->likes->count(),
        ];
    }

    /**
     * Summary of broadcastAs
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'TweetLikesWereUpdated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
