<?php

namespace Dmm\Tests;

use BadMethodCallException;
use Dmm\Client;
use Dmm\HttpClient\Api\CustomFields;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

class ClientTest extends TestCase
{
    /** @test */
    public function shouldNotHaveToPassHttpClientToConstructor()
    {
        $client = new Client('');

        $this->assertInstanceOf(ClientInterface::class, $client->getHttpClient());
    }

    /**
     * @test
     * @dataProvider getApiClassesProvider
     */
    public function shouldGetMagicApiInstance($apiName, $class)
    {
        $client = new Client('');

        $this->assertInstanceOf($class, $client->$apiName());
    }

    /** @test */
    public function shouldNotGetMagicApiInstance()
    {
        $this->expectException(BadMethodCallException::class);
        $client = new Client('');
        $client->doNotExist();
    }

    public function getApiClassesProvider()
    {
        return [
            ['customFields', CustomFields::class],
        ];
    }
}