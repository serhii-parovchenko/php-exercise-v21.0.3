<?php

namespace App\Events;

use App\Contracts\NotificationInterface;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompanyFormSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var NotificationInterface
     */
    public NotificationInterface $notifier;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(NotificationInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
