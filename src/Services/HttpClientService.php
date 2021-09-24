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
        $res = $this->http->request('GET', $this->buildUrl($url, $params));
        if($res->getStatusCode() !== 200)
            return (['error' => 'la ville est introuvable', 'status'=>404]);
        return $toArray ? json_decode($res->getContent(), true) : $res;
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
