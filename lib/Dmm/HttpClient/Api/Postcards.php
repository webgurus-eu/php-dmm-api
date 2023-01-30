<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class Postcards extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTE-list-all-postcards
     *
     * @throws Exception|JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/postcards', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTM-retrieve-a-postcard
     *
     * @throws Exception|JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/postcards/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTI-create-a-postcard
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/postcards', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTQ-delete-a-postcard
     *
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/postcards/$id");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTU-cancel-a-postcard
     *
     * @throws JsonException
     */
    public function cancel(string $id): array|string
    {
        return $this->post("/postcards/$id/cancel");
    }
}
