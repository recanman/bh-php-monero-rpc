[![PHP 8.0](https://img.shields.io/badge/PHP-8.0-8892BF.svg)]() [![PHPCS PSR-12](https://img.shields.io/badge/PHPCS-PSR–12❌-lightgrey.svg)](https://www.php-fig.org/psr/psr-12/) [![PHPUnit ](.github/coverage.svg)](https://brianhenryie.github.io/bh-php-monero-explorer/) [![PHPStan ](.github/phpstan.svg)](https://phpstan.org/)

# Monero Daemon JSON RPC PHP Client

> ⚠️ Work in progress. 

Goal is to return strongly typed objects from the RPC response. Ultimately to use in the monero-integrations/monerowp WooCommerce plugin.

This project is `daemonRPC.php` extracted from [monero-integrations/monerophp](https://github.com/monero-integrations/monerophp).

## Use

Before v1.0, function signatures are expected to change as they are properly documented.

```bash
composer config minimum-stability dev
composer config prefer-stable true

composer config repositories.brianhenryie/bh-php-monero-daemon-rpc git https://github.com/brianhenryie/bh-php-monero-daemon-rpc

composer require --fixed brianhenryie/bh-php-monero-daemon-rpc
```

## Operation

```php
// Guzzle HttpFactory implements both RequestFactoryInterface and UriFactoryInterface.
$httpFactory = new \GuzzleHttp\Psr7\HttpFactory();
/** @var Psr\Http\Message\UriFactoryInterface $uriFactory */
$uriFactory = $httpFactory; 
/** @var Psr\Http\Message\RequestFactoryInterface $requestFactory */
$requestFactory = $httpFactory;
/** @var Psr\Http\Client\ClientInterface $client */
$client = new \GuzzleHttp\Client();

$monero = new \BrianHenryIE\MoneroDaemonRpc\DaemonRpcClient($uriFactory, $requestFactory, $client);

$result = $monero->getBlockCount()->getCount();
```


## Documentation

* https://github.com/monero-project/monero/wiki/Daemon-RPC-documentation
* https://www.jsonrpc.org/specification
* https://en.wikipedia.org/wiki/JSON-RPC
* Documentation can be found in the [`/docs`](tree/master/docs) folder.

## Configuration
 
1. Start the Monero daemon (`monerod`) on testnet.
```bash
monerod --testnet --detach
```

## Goals

* [ ] Stronly typed 
* [ ] Test coverage
* [ ] PhpDoc
* [ ] PSR abstraction (currently has a nyholm/psr7 dependency that can maybe be removed)
* [ ] Short tutorials

## Test Data

* [monerojs/monerojs](https://github.com/monerojs/monerojs/blob/dev/test/index_test.js)
* [monero-rs/monero-rpc-rs](https://github.com/monero-rs/monero-rpc-rs/blob/main/tests/clients_tests/basic_daemon_rpc.rs)
* [monero-ecosystem/python-monerorpc](https://github.com/monero-ecosystem/python-monerorpc/blob/master/examples/test_rpc_batch.py)
* [monero-ecosystem/monero-python](https://github.com/monero-ecosystem/monero-python/blob/master/tests/test_jsonrpcdaemon.py)
* [monero-ecosystem/monero-java](https://github.com/monero-ecosystem/monero-java/blob/master/src/test/java/test/TestMoneroDaemonRpc.java)

## Dependencies

* [simpod/json-rpc](https://github.com/simPod/PhpJsonRpc) – 0% coverage. PSR compliant.
* [JsonMapper/JsonMapper](https://github.com/JsonMapper/JsonMapper) | [JsonMapper.net](https://jsonmapper.net) - 100% coverage

## Acknowledgements

* The Monero Integrations team. [monerointegrations.com](https://monerointegrations.com) | [github.com/monero-integrations](https://github.com/monero-integrations/monerophp/graphs/contributors)
* [jacobdekeizer json-to-php-generator](https://jacobdekeizer.github.io/json-to-php-generator/#/)


