<?php

namespace Tests\Unit;

use App\Mail\CompanyMail;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Mail;

class MailNotificationServiceTest extends TestCase
{
    public function test_notification_was_not_sent()
    {
        Mail::fake();

        Mail::assertNothingSent();
    }

    public function test_notification_was_sent()
    {
        Mail::fake();

        Mail::send(new CompanyMail([]));

        Mail::assertSent(CompanyMail::class);
    }
}
