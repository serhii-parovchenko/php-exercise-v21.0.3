<?php

namespace App\Services;

use App\Contracts\NotificationInterface;
use App\Mail\CompanyMail;
use Illuminate\Support\Facades\Mail;

class MailNotificationService implements NotificationInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function send(): void
    {
        Mail::send(new CompanyMail($this->data));
    }
}
