<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class Artworks extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzQ-list-all-artworks
     *
     * @throws Exception|JsonException
     */
    public function list(array $params = []): array|string
    {
        return $this->get('/artworks', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzY-retrieve-an-artwork
     *
     * @throws Exception|JsonException
     */
    public function retrieve(string $id, array $params = []): array|string
    {
        return $this->get("/artworks/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3MzU-create-an-artwork
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/artworks', $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mzc-update-an-artwork
     *
     * @throws Exception|JsonException
     */
    public function update(string $id, array $payload): array|string
    {
        return $this->put("/artworks/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mzg-delete-an-artwork
     *
     * @throws Exception|JsonException
     */
    public function destroy(string $id): array|string
    {
        return $this->delete("/artworks/$id");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3Mzk-get-variables-merge-tags-of-a-specific-artwork
     *
     * @throws Exception|JsonException
     */
    public function variables(string $id): array|string
    {
        return $this->get("/artworks/$id/variables");
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDA-generate-preview-of-an-artwork
     *
     * @throws Exception|JsonException
     */
    public function generatePreview(string $id, array $payload = []): array|string
    {
        return $this->post("/artworks/$id/generate-preview", $payload);
    }
}
