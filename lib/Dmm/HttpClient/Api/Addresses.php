<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class Addresses extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjU-list-all-addresses
     *
     * @throws Exception
     * @throws JsonException
     */
    public function list($params = []): array|string
    {
        return $this->get('/addresses', $params);
    }
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MzU3OTUxODQ-list-all-suppressed-addresses
     *
     * @throws Exception
     * @throws JsonException
     */
    public function suppressedList($params = []): array|string
    {
        return $this->get('/addresses/suppressed', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mjc-retrieve-an-address
     *
     * @throws Exception
     * @throws JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/addresses/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MjY-create-an-address
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/addresses', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mjg-update-an-address
     *
     * @throws JsonException
     * @throws Exception
     */
    public function update(string $id, array $payload): array|string
    {
        return $this->put("/addresses/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mjk-delete-an-address
     *
     * @throws JsonException
     * @throws Exception
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/addresses/$id");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MzU3OTUxODU-attach-address-to-a-mailing-list
     *
     * @throws JsonException
     */
    public function attachToMailingList(string $id, array $payload): array|string
    {
        return $this->post("/addresses/$id/attach", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MzU3OTUxODY-detach-address-from-a-mailing-list
     *
     * @throws JsonException
     */
    public function detachFromMailingList(string $id, array $payload): array|string
    {
        return $this->post("/addresses/$id/detach", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzE-suppress-an-address
     *
     * @throws JsonException
     */
    public function suppress(string $id): array|string
    {
        return $this->patch("/addresses/$id/suppress");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzI-un-suppress-an-address
     *
     * @throws JsonException
     */
    public function unSuppress(string $id): array|string
    {
        return $this->patch("/addresses/$id/un-suppress");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzM-import-addresses-in-bulk
     *
     * @throws JsonException
     */
    public function import(array $payload): array|string
    {
        return $this->post('/addresses/import', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzA-restore-an-address
     *
     * @throws JsonException
     */
    public function restore(string $id): array|string
    {
        return $this->post("/addresses/$id/restore");
    }
}