<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class CustomFields extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDY-list-all-custom-fields
     * @throws Exception|JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/custom-fields', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDg-retrieve-a-custom-field
     * @throws Exception|JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/custom-fields/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDc-create-a-custom-field
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/custom-fields', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDk-update-a-custom-field
     * @throws Exception|JsonException
     */
    public function update(string $id, array $payload): array|string
    {
        return $this->put("/custom-fields/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTA-delete-a-custom-field
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/custom-fields/$id");
    }
}
