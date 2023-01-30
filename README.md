<p align="center">
  <a href="https://directmailmanager.com/?utm_source=github&utm_medium=logo" target="_blank">
    <img src="https://directmailmanager.com/wp-content/themes/dmm-2021/dist/images/dmm-logo.svg" alt="Sentry" width="280" height="84" style="background-color:#0B144A;padding:10px">
  </a>
</p>

# Official Direct Mail Manager v3 SDK for PHP

A simple Object-Oriented wrapper for DMM API, written with PHP.

[![StyleCI](https://github.styleci.io/repos/7548986/shield?style=shield)](https://github.styleci.io/repos/7548986/shield?style=plastic)
[![Latest Stable Version](http://poser.pugx.org/directmailmanager/php-dmm-api/v)](https://packagist.org/packages/directmailmanager/php-dmm-api)
[![License](http://poser.pugx.org/directmailmanager/php-dmm-api/license)](https://packagist.org/packages/directmailmanager/php-dmm-api)
[![Monthly Downloads](http://poser.pugx.org/directmailmanager/php-dmm-api/d/monthly)](https://packagist.org/packages/directmailmanager/php-dmm-api)
[![Daily Downloads](http://poser.pugx.org/directmailmanager/php-dmm-api/d/daily)](https://packagist.org/packages/directmailmanager/php-dmm-api)

|  Version  |                                                                                Build Status                                                                                |                                                                       Code Coverage                                                                        |
|:---------:|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|:----------------------------------------------------------------------------------------------------------------------------------------------------------:|
|  `main`   |  [![CI](https://github.com/webgurus-eu/php-dmm-api/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/webgurus-eu/php-dmm-api/actions/workflows/ci.yml)   |  [![codecov](https://codecov.io/gh/webgurus-eu/php-dmm-api/branch/main/graph/badge.svg?token=G01NP1ZPNW)](https://codecov.io/gh/webgurus-eu/php-dmm-api)   |
| `develop` | [![CI](https://github.com/webgurus-eu/php-dmm-api/actions/workflows/ci.yml/badge.svg?branch=develop)](https://github.com/webgurus-eu/php-dmm-api/actions/workflows/ci.yml) | [![codecov](https://codecov.io/gh/webgurus-eu/php-dmm-api/branch/develop/graph/badge.svg?token=G01NP1ZPNW)](https://codecov.io/gh/webgurus-eu/php-dmm-api) |


## Features

* Light and fast thanks to lazy loading of API classes

## Prerequisites

First, you will need to first create an account at directmailmanager.com and obtain your Live API Key.
You may access your API Keys from the [Settings > API Keys](https://app.directmailmanager.com/settings/api-keys/) after you've created an account.


## Requirements

* PHP >= 8.0
* A [HTTP client](https://packagist.org/providers/php-http/client-implementation)
* A [PSR-7 implementation](https://packagist.org/providers/psr/http-message-implementation)
* (optional) PHPUnit to run tests.

## Getting started

### Install

To install the SDK you will need to be using [Composer]([https://getcomposer.org/)
in your project. To install it please see the [docs](https://getcomposer.org/download/). </br>

```bash
composer require directmailmanager/php-dmm-api
```

The package (`directmailmanager/php-dmm-api`) is not tied to any specific library that sends HTTP messages. Instead,
it uses [Httplug](https://github.com/php-http/httplug) to let users choose whichever
PSR-7 implementation and HTTP client they want to use.

If you just want to get started quickly you should run the following command:

```bash
composer require directmailmanager/php-dmm-api php-http/curl-client 
```

This is basically what the metapackage (`directmailmanager/php-dmm-api`) provides.

This will install the library as well as an HTTP client adapter that use Guzzle as a transport
method (provided by Httplug).You do not have to use those
packages if you do not want to. You may
use any package that provides [`php-http/async-client-implementation`](https://packagist.org/providers/php-http/async-client-implementation)
and [`http-message-implementation`](https://packagist.org/providers/psr/http-message-implementation).

### Documentation

See the [PHP API docs](https://apidocs.directmailmanager.com/docs/dmm-v3-api/).
