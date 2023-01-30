<?php

namespace Dmm\Tests\HttpClient\Message;

use Dmm\HttpClient\Messages\Response;
use JsonException;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testJsonWithoutErrors()
    {
        $body = ['foo' => 'bar'];
        $response = new \GuzzleHttp\Psr7\Response(
            200,
            ['Content-Type'=>'application/json'],
            json_encode($body)
        );

        $this->assertEquals($body, Response::json($response));
    }

    public function testJsonWithErrors()
    {
        $this->expectException(JsonException::class);

        $body = ['foo' => 'bar'];
        $response = new \GuzzleHttp\Psr7\Response(
            200,
            ['Content-Type'=>'application/json'],
            json_encode($body).'safag'
        );

        Response::json($response);
    }

    public function testJsonWithoutContentTypeHeader()
    {
        $body = ['foo' => 'bar'];
        $response = new \GuzzleHttp\Psr7\Response(
            200,
            [],
            $encodedBody = json_encode($body)
        );

        $this->assertEquals($encodedBody, Response::json($response));
    }
}
