<?php

namespace App\Services\Abstractions;

interface HttpClientServiceInterface
{
    public function sendGetRequest(string $url, array $params, bool $toArray = false): string | array;
}
