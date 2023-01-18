<?php

namespace Dmm;

use BadMethodCallException;
use Dmm\Helpers\DiscoverApi;
use Dmm\HttpClient\Api\AbstractApi;
use Dmm\HttpClient\Builder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\Authentication\Bearer;
use InvalidArgumentException;

final class Client
{

    private Builder $httpClientBuilder;
    private array $placeholder;


    public function __construct(private readonly string $token, Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder();
        $this->defineBasePath();
        $this->autoDiscoverApi();
        $this->initDefaultPlugins();
        $this->authenticate();
    }

    private function defineBasePath(): void
    {
        define('__BASE_PATH__', dirname(__DIR__));
    }


    private function autoDiscoverApi(): void
    {
        $path = sprintf("%s/HttpClient/Api", __DIR__);

        $files = DiscoverApi::within($path, __BASE_PATH__);

        $keys = array_keys($files);
        $items = array_map(function ($value) {
            return new $value($this);
        }, $files, $keys);

        $this->placeholder = array_combine($keys, $items);
    }

    private function initDefaultPlugins(): void
    {
        $this->httpClientBuilder->addPlugin(new BaseUriPlugin(Psr17FactoryDiscovery::findUriFactory()->createUri('https://api.directmailmanager.com/api')));
        $this->httpClientBuilder->addPlugin(new HeaderDefaultsPlugin([
            'User-Agent' => 'php-dmm-api ()',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]));
    }

    private function authenticate(): void
    {
        $this->getHttpClientBuilder()->addPlugin(new AuthenticationPlugin(new Bearer($this->token)));
    }

    protected function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    public function __call($name, $args): AbstractApi
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    private function api(string $api): AbstractApi
    {
        if (!array_key_exists($api, $this->placeholder)) {
            throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $api));
        }

        return $this->placeholder[$api];
    }
}
