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
    public function shouldNotHaveToPassHttpClientToConstructor(): void
    {
        $client = new Client('');

        $this->assertInstanceOf(ClientInterface::class, $client->getHttpClient());
    }

    /**
     * @test
     * @dataProvider getApiClassesProvider
     */
    public function shouldGetMagicApiInstance($apiName, $class): void
    {
        $client = new Client('');

        $this->assertInstanceOf($class, $client->$apiName());
    }

    /** @test */
    public function shouldNotGetMagicApiInstance(): void
    {
        $this->expectException(BadMethodCallException::class);
        $client = new Client('');
        $client->doNotExist();
    }

    public function getApiClassesProvider(): array
    {
        return [
            ['customFields', CustomFields::class],
        ];
    }
}
