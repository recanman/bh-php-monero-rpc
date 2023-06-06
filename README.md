# Monero Daemon JSON RPC CLient

Work in progress. Goal is to return strongly typed objects from the RPC response. Ultimately to use in the monero-integrations/monerowp WooCommerce plugin.

## How It Works

1. A Monero daemon JSON RPC API wrapper, `daemonRPC.php`



## Documentation
https://www.jsonrpc.org/specification

https://en.wikipedia.org/wiki/JSON-RPC

https://github.com/monero-project/monero/wiki/Daemon-RPC-documentation


Documentation can be found in the [`/docs`](https://github.com/sneurlax/monerophp/tree/master/docs) folder.

## Configuration
### Requirements
 - Monero daemon (`monerod`)

 
### Getting Started

1. Start the Monero daemon (`monerod`) on testnet.
```bash
monerod --testnet --detach
```


## Acknowledgements

The [Monero Integrations](https://monerointegrations.com) [team](https://github.com/monero-integrations/monerophp/graphs/contributors).

https://jacobdekeizer.github.io/json-to-php-generator/#/

