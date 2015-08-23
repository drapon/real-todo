<?php

namespace App\Events;

use App\Photo;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PhotoCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Photo $photo)
    {

        $this->data = array(
            'id'=> $photo->id,
            'img_name'=> $photo->img_name
        );
        // $this->data = array(
        //   'id' => '1234'
        // );
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
