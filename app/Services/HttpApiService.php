<?php

namespace App\Services;

use App\Contracts\ApiInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class HttpApiService implements ApiInterface
{
    private array $params;
    private array|null $headers;
    private $data;

    public function __construct(array $params, ?array $headers = [])
    {
        $this->params = $params;
        $this->headers = $headers;
    }

    public function sendRequest(): void
    {
        if ($this->headers) {
            $this->data = Http::withHeaders($this->headers)->get($this->params['url'], $this->params['query'] ?? []);
        } else {
            $this->data = Http::get($this->params['url'], $this->params['query'] ?? []);
        }
    }

    public function getRequestedData(?string $type = null): Collection
    {
        if ($type) {
            return collect($this->data->json($type));
        }

        return collect($this->data->json());
    }
}
