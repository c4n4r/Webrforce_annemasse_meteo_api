<?php

namespace App\Services;

use App\Services\Abstractions\HttpClientServiceInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientService implements HttpClientServiceInterface
{
    private $http;
    public function __construct(HttpClientInterface $http)
    {
        $this->http = $http;
    }
    public function sendGetRequest(string $url, array $params, bool $toArray = false): string | array {
        $res = $this->http->request('GET', $this->buildUrl($url, $params))->getContent();
        return $toArray ? json_decode($res, true) : $res;
    }

    private function buildUrl(string $url, array $params): string {
        if(sizeof($params) > 0) {
            $url .= "?";
            foreach ($params as $key => $value){
                $url .= $key."=".$value."&";
            }
        }

        return $url;
    }
}
