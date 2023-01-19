<?php

namespace Dmm\Tests\Api;

use Dmm\Client;
use Dmm\HttpClient\Api\AbstractApi;
use GuzzleHttp\Psr7\Response;
use Http\Client\Common\HttpMethodsClientInterface;
use PHPUnit\Framework\MockObject\MockObject;

class AbstractApiTest extends TestCase
{
    /** @test */
    public function shouldPassGETRequestToClient()
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['get']);
        $httpClient
            ->expects($this->any())
            ->method('get')
            ->with('/path?param1=param1value', ['header1' => 'header1value'])
            ->will($this->returnValue($this->getPSR7Response($expectedArray)));
        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);

        $actual = $this->getMethod($api, 'get')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['header1' => 'header1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test */
    public function shouldPassPOSTRequestToClient()
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['post']);
        $httpClient
            ->expects($this->once())
            ->method('post')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value']))
            ->will($this->returnValue($this->getPSR7Response($expectedArray)));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'post')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test */
    public function shouldPassPATCHRequestToClient()
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['patch']);
        $httpClient
            ->expects($this->once())
            ->method('patch')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value']))
            ->will($this->returnValue($this->getPSR7Response($expectedArray)));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'patch')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test */
    public function shouldPassPUTRequestToClient()
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['put']);
        $httpClient
            ->expects($this->once())
            ->method('put')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value']))
            ->will($this->returnValue($this->getPSR7Response($expectedArray)));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'put')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    /** @test */
    public function shouldPassDELETERequestToClient()
    {
        $expectedArray = ['value'];

        $httpClient = $this->getHttpMethodsMock(['delete']);
        $httpClient
            ->expects($this->once())
            ->method('delete')
            ->with('/path', ['option1' => 'option1value'], json_encode(['param1' => 'param1value']))
            ->will($this->returnValue($this->getPSR7Response($expectedArray)));

        $client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([''])
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $api = $this->getAbstractApiObject($client);
        $actual = $this->getMethod($api, 'delete')
            ->invokeArgs($api, ['/path', ['param1' => 'param1value'], ['option1' => 'option1value']]);

        $this->assertEquals($expectedArray, $actual);
    }

    protected function getAbstractApiObject($client): MockObject
    {
        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods([])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    protected function getClientMock(): Client
    {
        return new Client($this->getHttpMethodsMock());
    }

    protected function getHttpMethodsMock(array $methods = []): HttpMethodsClientInterface
    {
        $mock = $this->createMock(HttpMethodsClientInterface::class);

        $mock
            ->expects($this->any())
            ->method('sendRequest');

        return $mock;
    }

    private function getPSR7Response($expectedArray): Response
    {
        return new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($expectedArray)
        );
    }

    protected function getApiClass(): string
    {
        return AbstractApi::class;
    }
}