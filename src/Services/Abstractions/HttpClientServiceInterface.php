<?php

namespace App\Services\Abstractions;

use Error;

interface HttpClientServiceInterface
{
    public function sendGetRequest(string $url, array $params, bool $toArray = false): string | array;
}
