<?php

namespace Tests\Unit;

use App\Services\HttpApiService;
use PHPUnit\Framework\TestCase;

class HttpApiServiceTest extends TestCase
{
    /**
     * @var HttpApiService|\PHPUnit\Framework\MockObject\MockObject
     */
    private $apiService;

    protected function setUp(): void
    {
        $this->apiService = $this->createMock(HttpApiService::class);
    }

    public function test_send_request_method(): void
    {
        $this->apiService->expects($this->exactly(1))
            ->method('sendRequest');

        $this->apiService->sendRequest();
    }

    public function test_get_requested_data(): void
    {
        $this->apiService->expects($this->exactly(1))
            ->method('getRequestedData')
            ->willReturn(collect(['one' => 1, 'two' => 2, 'three' => 3]));

        $this->assertArrayHasKey('one', $this->apiService->getRequestedData());
    }
}
