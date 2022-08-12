<?php

namespace Tests\Unit;

use App\Services\HttpApiService;
use PHPUnit\Framework\TestCase;

class HttpApiServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_send_request_method()
    {
        $mock = $this->createMock(HttpApiService::class);
        $mock->expects(self::once())
            ->method('sendRequest')
            ->with('test', 2);

        $this->assertTrue();
    }
}
