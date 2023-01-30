<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class MailingLists extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjQ-list-mailing-list-addresses
     *
     * @throws Exception|JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/mailing-lists', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjQ-list-mailing-list-addresses
     *
     * @throws Exception|JsonException
     */
    public function listAddresses($id, array $params = []): array|string
    {
        return $this->get("/mailing-lists/$id/addresses", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjE-retrieve-a-mailing-list
     *
     * @throws Exception|JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/mailing-lists/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjA-create-a-mailing-list
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/mailing-lists', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjI-update-a-mailing-list
     *
     * @throws Exception|JsonException
     */
    public function update(string $id, array $payload): array|string
    {
        return $this->put("/mailing-lists/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjM-delete-a-mailing-list
     *
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/mailing-lists/$id");
    }
}
