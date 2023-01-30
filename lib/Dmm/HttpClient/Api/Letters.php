<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class Letters extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6NDQwMTczOTU-list-all-letters
     *
     * @throws Exception|JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/letters', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6NDQwMTczOTY-retrieve-a-letter
     *
     * @throws Exception|JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/letters/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6NDQ1NTEzOTY-create-a-letter
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/letters', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6NDQwMTczOTc-delete-a-letter
     *
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/letters/$id");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6NDQwMTczOTg-cancel-a-letter
     *
     * @throws JsonException
     */
    public function cancel(string $id): array|string
    {
        return $this->post("/letters/$id/cancel");
    }
}
