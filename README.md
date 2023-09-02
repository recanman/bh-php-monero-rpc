[![PHP 8.0](https://img.shields.io/badge/PHP-8.0-8892BF.svg)]() [![PHPCS PSR-12](https://img.shields.io/badge/PHPCS-PSR–12❌-lightgrey.svg)](https://www.php-fig.org/psr/psr-12/) [![PHPUnit ](.github/coverage.svg)](https://brianhenryie.github.io/bh-php-monero-rpc/) [![PHPStan ](.github/phpstan.svg)](https://phpstan.org/)

# Monero RPC PHP Client

> ⚠️ Work in progress. 

Goal is to return strongly typed objects from the RPC response. Ultimately to use in the [monero-integrations/monerowp WooCommerce plugin](https://github.com/monero-integrations/monerowp).

This project is `daemonRPC.php` and `walletRPC.php` extracted from [monero-integrations/monerophp](https://github.com/monero-integrations/monerophp).

Status: Much of `Daemon` is strongly typed and unit tested. `Wallet` returns `stdClass` objects.

Before v1.0, function signatures are expected to change as they are properly documented.

## Install

```bash
composer config minimum-stability dev
composer config prefer-stable true

composer config repositories.brianhenryie/bh-php-monero-rpc git https://github.com/brianhenryie/bh-php-monero-rpc

composer require --fixed brianhenryie/bh-php-monero-rpc
```

## Operation

Start the Monero daemon (`monerod`).

```bash
monerod --detach
```

```php
// Guzzle HttpFactory implements RequestFactoryInterface, UriFactoryInterface, and StreamFactoryInterface.
$httpFactory = new \GuzzleHttp\Psr7\HttpFactory();
/** @var Psr\Http\Message\UriFactoryInterface $uriFactory */
$uriFactory = $httpFactory;
/** @var Psr\Http\Message\RequestFactoryInterface $requestFactory */
$requestFactory = $httpFactory;
/** @var Psr\Http\Client\ClientInterface $client */
$client = new \GuzzleHttp\Client();
/** @var Psr\Http\Message\StreamFactoryInterface $streamFactory */
$streamFactory = $httpFactory;

$monero = new \BrianHenryIE\MoneroRpc\Daemon(
    $uriFactory,
    $requestFactory,
    $client,
    $streamFactory,
);

$result = $monero->getBlockCount()->getCount();
```

## Contributing 

> ⚠️ PRs helping improve the PhpDoc of methods are very welcome.

The `tests/contract` directory contains tests that make live queries to `monerod`. `tests/unit` contains tests which mock the RPC response, and `tests/unit/model/jsonmapper` uses JSON saved in `tests/_data` to test the model parsing.

Contract tests can be static or dynamic – `Daemon::getBlockByHash()` will always return the same result for the same input, but `Daemon::getBlockCount()` will regularly change. For the latter tests, a function, `::extractFromCli()`, exists to execute the Monero CLI and extract a value by using regex on its response, to then use as the expected value in the test assertion.  

To add a strongly typed response to a Daemon or Wallet method which does not have one, first create a contract test which will call that method. In `RpcClient::run()` temporarily add a line ~`$responseString = (string) $response;`, set a breakpoint after it, run the test, and copy the value. Save the `result` key in `tests/_data` with an appropriate name. Use the online tool [jacobdekeizer/json-to-php-generator](https://jacobdekeizer.github.io/json-to-php-generator/#/) to create a PHP model, use PhpStorm menu Code/Generate to add getters and setters, and save it.  Create a corresponding interface containing only the `get()` methods of the model – this is where PhpDoc should be written. Add the new class and file to the `MappersTest.php` dataprovider. Update the contract test to use the new class. Create a unit test which uses the entire copied response by using the `getDaemonClient()` method. For each method with PhpDoc, create test assertion that calls that method, i.e. unit test coverage should reflect the class is complete.   

* Start the Monero daemon on testnet
```bash
monerod --testnet --detach
```

* Run all tests:

```bash
composer test
```

* Run PHP Code Beautifer, CodeSniffer, and PhpStan:

```bash
composer lint
```

## Documentation

* https://github.com/monero-project/monero/wiki/Daemon-RPC-documentation
* https://www.jsonrpc.org/specification
* https://en.wikipedia.org/wiki/JSON-RPC
* Documentation can be found in the [`/docs`](tree/master/docs) folder.


## Goals

* [ ] Strongly typed 
* [ ] Test coverage
* [ ] PhpDoc
* [ ] PSR abstraction (currently has a nyholm/psr7 dependency that can [maybe be removed](https://github.com/simPod/PhpJsonRpc/issues/70))
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


