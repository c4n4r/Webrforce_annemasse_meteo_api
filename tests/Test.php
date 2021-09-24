<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class Test extends KernelTestCase
{
    public function testWeatherClientHttp()
    {
        $this->expectError();

       // $this->expectError();
        self::bootKernel();
        $http = self::getContainer()->get(\App\Services\HttpClientService::class);

        $data = $http->sendGetRequest('https://api.openweathermap.org/data/2.5/weather',
            ['q' => 'nice', 'appId' => self::getContainer()->getParameter('API_KEY')], true);

        self::assertIsArray($data);
        $data = $http->sendGetRequest('https://api.openweathermap.org/data/2.5/weather',
            ['q' => 'nice', 'appId' => self::getContainer()->getParameter('API_KEY')], false);


        $data = $http->sendGetRequest('https://api.openweathermap.org/data/2.5/weather',
            ['q' => 'ifazoifazlbliabgiazbgiuaz', 'appId' => self::getContainer()->getParameter('API_KEY')], false);

        self::assertIsArray($data);
        self::assertEquals($data['status'], 404);

    }
}
