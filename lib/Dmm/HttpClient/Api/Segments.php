<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class Segments extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTY-list-all-segments
     * @throws Exception |JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/segments', $params);
    }


    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NjE-list-segmented-addresses
     * @throws Exception |JsonException
     */
    public function listAddresses($id, array $params = []): array|string
    {
        return $this->get("/segments/$id/addresses", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTg-retrieve-a-segment
     * @throws Exception | JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/segments/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTc-create-a-segment
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/segments', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTk-update-a-segment
     * @throws Exception|JsonException
     */
    public function update(string $id, array $payload): array|string
    {
        return $this->put("/segments/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NjA-delete-a-segment
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/segments/$id");
    }
}
