<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class ArtworkVersions extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDE-list-all-versions-of-an-artowrk
     *
     * @throws Exception|JsonException
     */
    public function list(string $artworkId, array $params = []): array|string
    {
        return $this->get("/artworks/$artworkId/versions", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDM-retrieve-a-specific-artwork-version
     *
     * @throws Exception|JsonException
     */
    public function retrieve(string $artworkId, string $id, array $params = []): array|string
    {
        return $this->get("/artworks/$artworkId/versions/$id", $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDI-create-an-artwork-version
     *
     * @throws JsonException
     */
    public function create(string $artworkId, array $payload): array|string
    {
        return $this->post("/artworks/$artworkId/versions", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDQ-update-a-specific-artwork-version
     *
     * @throws Exception|JsonException
     */
    public function update(string $artworkId, string $id, array $payload): array|string
    {
        return $this->put("/artworks/$artworkId/versions/$id", $payload);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MjU4MTE3NDU-delete-a-specific-artwork-version
     *
     * @throws Exception|JsonException
     */
    public function destroy(string $artworkId, string $id): array|string
    {
        return $this->delete("/artworks/$artworkId/versions/$id");
    }
}
