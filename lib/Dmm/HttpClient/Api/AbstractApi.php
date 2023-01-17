<?php

namespace Dmm\HttpClient\Api;

use Dmm\Client;
use Dmm\HttpClient\Messages\Response;
use Http\Client\Exception;
use JsonException;

abstract class AbstractApi
{

    public function __construct(protected Client $client)
    {
    }

    /**
     * @throws JsonException
     * @throws Exception
     */
    protected function get(string $path, array $parameters = [], array $requestHeaders = []): array|string
    {
        if (count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);
        }

        $response = $this->client->getHttpClient()->get($path, $requestHeaders);

        return Response::json($response);
    }

    /**
     * @throws JsonException
     */
    protected function post(string $path, array $payload = [], array $requestHeaders = []): string|array
    {
        return $this->postRaw($path, $this->jsonBody($payload), $requestHeaders);
    }

    /**
     * @throws JsonException
     * @throws Exception
     */
    protected function postRaw(string $path, $body, array $requestHeaders = []): string|array
    {
        $response = $this->client->getHttpClient()->post($path, $requestHeaders, $body);

        return Response::json($response);
    }

    /**
     * @throws JsonException
     */
    protected function jsonBody(array $payload): ?string
    {
        $flags = empty($payload) ? JSON_FORCE_OBJECT : 0;

        return (count($payload) === 0) ? null : json_encode($payload, JSON_THROW_ON_ERROR | $flags);
    }

    /**
     * @throws JsonException|Exception
     */
    protected function put(string $path, array $payload = [], array $requestHeaders = []): array|string
    {
        $response = $this->client->getHttpClient()->put($path, $requestHeaders, $this->jsonBody($payload));

        return Response::json($response);
    }

    /**
     * @throws JsonException|Exception
     */
    protected function delete(string $path, array $payload = [], array $requestHeaders = []): array|string
    {
        $response = $this->client->getHttpClient()->delete($path, $requestHeaders, $this->jsonBody($payload));

        return Response::json($response);
    }

    /**
     * @throws JsonException|Exception
     */
    protected function patch(string $path, array $payload = [], array $requestHeaders = []): array|string
    {
        $response = $this->client->getHttpClient()->patch($path, $requestHeaders, $this->jsonBody($payload));

        return Response::json($response);
    }
}
