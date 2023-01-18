<?php

namespace Dmm\HttpClient\Api;

class CustomFields extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDY-list-all-custom-fields
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/custom-fields', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDg-retrieve-a-custom-field
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/custom-fields/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDc-create-a-custom-field
     */
    public function create(array $params = []): array|string
    {
        return $this->post('/custom-fields', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDk-update-a-custom-field
     */
    public function update(string $id, array $params = []): array|string
    {
        return $this->put("/custom-fields/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NTA-delete-a-custom-field
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/custom-fields/$id");
    }
}