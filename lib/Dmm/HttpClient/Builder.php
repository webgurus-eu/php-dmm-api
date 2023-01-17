<?php

namespace Dmm\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class Builder
{

    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactoryContract;
    private StreamFactoryInterface $streamFactoryContract;
    private array $plugins;

    public function __construct(ClientInterface $httpClient = null, RequestFactoryInterface $requestFactoryContract = null, StreamFactoryInterface $streamFactory = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactoryContract = $requestFactoryContract ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactoryContract = $streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return new HttpMethodsClient(
            (new PluginClientFactory())->createClient($this->httpClient, $this->plugins),
            $this->requestFactoryContract,
            $this->streamFactoryContract
        );
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->plugins[] = $plugin;
    }

}
