<?php

namespace App\Listeners;

use App\Contracts\NotificationInterface;
use App\Events\CompanyFormSubmitted;

class SendCompanyExistNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CompanyFormSubmitted $event
     * @return void
     */
    public function handle(CompanyFormSubmitted $event)
    {
        if ($event->notifier instanceof NotificationInterface) {
            $event->notifier->send();
        }
    }
}
