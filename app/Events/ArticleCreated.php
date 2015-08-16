<?php

namespace App\Events;

use App\Article;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        //
        $this->data = array(
            'id'=> $article->id,
            'title'=> $article->title,
            'body'=> $article->body
        );



    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
