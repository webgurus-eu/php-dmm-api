<?php

namespace Dmm\Tests\Api;

use Dmm\Client;
use Dmm\HttpClient\Api\AbstractApi;
use GuzzleHttp\Psr7\Response;
use Http\Client\Common\HttpMethodsClientInterface;
use JsonException;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;

class AbstractApiTest extends TestCase
{
    /** @test
     * @throws JsonException
     * @throws ReflectionException
     */
    public function shouldPassGETRequestToClient(): void
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['get']);
        $httpClient
            ->method('get')
            ->with('/path?param1=param1value', ['header1' => 'header1value'])
            ->willReturn($this->getPSR7Response($expectedArray));
        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);

        $actual = $this->getMethod($api, 'get')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['header1' => 'header1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    protected function getHttpMethodsMock(array $methods = []): HttpMethodsClientInterface
    {
        $mock = $this->createMock(HttpMethodsClientInterface::class);

        $mock
            ->expects($this->any())
            ->method('sendRequest');

        return $mock;
    }

    /**
     * @throws JsonException
     */
    private function getPSR7Response($expectedArray): Response
    {
        return new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($expectedArray, JSON_THROW_ON_ERROR)
        );
    }

    protected function getAbstractApiObject($client): MockObject
    {
        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods([])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    protected function getApiClass(): string
    {
        return AbstractApi::class;
    }

    /** @test
     * @throws ReflectionException
     * @throws JsonException
     */
    public function shouldPassPOSTRequestToClient(): void
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['post']);
        $httpClient
            ->expects($this->once())
            ->method('post')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value'], JSON_THROW_ON_ERROR))
            ->willReturn($this->getPSR7Response($expectedArray));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'post')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test
     * @throws JsonException
     * @throws ReflectionException
     */
    public function shouldPassPATCHRequestToClient(): void
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['patch']);
        $httpClient
            ->expects($this->once())
            ->method('patch')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value'], JSON_THROW_ON_ERROR))
            ->willReturn($this->getPSR7Response($expectedArray));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'patch')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test
     * @throws JsonException
     * @throws ReflectionException
     */
    public function shouldPassPUTRequestToClient(): void
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['put']);
        $httpClient
            ->expects($this->once())
            ->method('put')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value'], JSON_THROW_ON_ERROR))
            ->willReturn($this->getPSR7Response($expectedArray));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();

        $client->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'put')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test
     * @throws JsonException
     * @throws ReflectionException
     */
    public function shouldPassDELETERequestToClient(): void
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['delete']);

        $httpClient->expects($this->once())
            ->method('delete')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value'], JSON_THROW_ON_ERROR))
            ->willReturn($this->getPSR7Response($expectedArray));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'delete')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }
}
