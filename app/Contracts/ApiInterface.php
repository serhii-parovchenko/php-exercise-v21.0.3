<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ApiInterface
{
    public function sendRequest(): void;

    public function getRequestedData(?string $type = null): Collection;
}
