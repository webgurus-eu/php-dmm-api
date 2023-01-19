<?php

namespace Dmm\Tests\Api;

use Dmm\Client;
use Dmm\HttpClient\Builder;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Client\ClientInterface;
use ReflectionMethod;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract protected function getApiClass(): string;

    protected function getApiMock(): MockObject
    {
        $httpClient = $this->getMockBuilder(ClientInterface::class)
            ->onlyMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $client = new Client('', new Builder($httpClient));

        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods(['get', 'post', 'postRaw', 'patch', 'delete', 'put'])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    protected function getMethod($object, $methodName): ReflectionMethod
    {
        $method = new ReflectionMethod($object, $methodName);
        $method->setAccessible(true);

        return $method;
    }
}