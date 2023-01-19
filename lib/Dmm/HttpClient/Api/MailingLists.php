<?php

namespace Dmm\HttpClient\Api;

class MailingLists extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjQ-list-mailing-list-addresses
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/mailing-lists', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjQ-list-mailing-list-addresses
     */
    public function listAddresses($id, array $params = []): array|string
    {
        return $this->get("/mailing-lists/$id/addresses", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjE-retrieve-a-mailing-list
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/mailing-lists/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjA-create-a-mailing-list
     */
    public function create(array $params = []): array|string
    {
        return $this->post('/mailing-lists', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjI-update-a-mailing-list
     */
    public function update(string $id, array $params = []): array|string
    {
        return $this->put("/mailing-lists/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjM-delete-a-mailing-list
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/mailing-lists/$id");
    }

}
