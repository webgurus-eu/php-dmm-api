<?php

namespace Dmm\Tests\HttpClient;

use Dmm\HttpClient\Builder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\HeaderAppendPlugin;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    /** @test */
    public function shouldGetHttpClient(): void
    {
        $builder = $this->getMockBuilder(Builder::class)
            ->onlyMethods(['addPlugin'])
            ->getMock();

        $builder->expects($this->never())
            ->method('addPlugin')
            ->with($this->isInstanceOf(HeaderAppendPlugin::class));

        $this->assertInstanceOf(HttpMethodsClientInterface::class, $builder->getHttpClient());
    }
}
