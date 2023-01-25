<?php

namespace Dmm\HttpClient\Api;

use Http\Client\Exception;
use JsonException;

class CompanyAddresses extends AbstractApi
{
    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MzU3OTUxODc-list-all-company-addresses
     *
     * @throws Exception
     * @throws JsonException
     */
    public function list($params = []): array|string
    {
        return $this->get('/company-addresses', $params);
    }

    /**
     * @link https://apidocs.directmailmanager.com/docs/dmm-v3-api/b3A6MzU3OTUxODg-create-a-company-address
     *
     * @throws JsonException
     */
    public function create(array $payload): array|string
    {
        return $this->post('/company-addresses', $payload);
    }
}