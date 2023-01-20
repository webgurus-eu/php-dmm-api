<?php

namespace Dmm\Tests\Api;

use Dmm\Client;
use Dmm\HttpClient\Builder;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Client\ClientInterface;
use ReflectionException;
use ReflectionMethod;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function getApiMock(): MockObject
    {
        $httpClient = $this->getMockBuilder(ClientInterface::class)
            ->onlyMethods(['sendRequest'])
            ->getMock();

        $httpClient->method('sendRequest');

        $client = new Client('', new Builder($httpClient));

        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods(['get', 'post', 'postRaw', 'patch', 'delete', 'put'])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    abstract protected function getApiClass(): string;

    /**
     * @throws ReflectionException
     */
    protected function getMethod($object, $methodName): ReflectionMethod
    {
        return new ReflectionMethod($object, $methodName);
    }
}
