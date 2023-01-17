<?php

namespace Dmm\HttpClient\Messages;

use JsonException;
use Psr\Http\Message\ResponseInterface;

final class Response
{
    /**
     * @throws JsonException
     */
    public static function json(ResponseInterface $response): array|string
    {
        $body = $response->getBody()->__toString();

        if (str_starts_with($response->getHeaderLine('Content-Type'), 'application/json')) {
            $json = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

            if (JSON_ERROR_NONE === json_last_error()) {
                return $json;
            }
        }

        return $body;
    }
}
