<?php

/**
 *
 * monerophp/daemonRPC
 *
 * A class for making calls to a Monero daemon's RPC API using PHP
 * https://github.com/monero-integrations/monerophp
 *
 * Using work from
 *   CryptoChangements [Monero_RPC] <bW9uZXJv@gmail.com> (https://github.com/cryptochangements34)
 *   Serhack [Monero Integrations] <nico@serhack.me> (https://serhack.me)
 *   TheKoziTwo [xmr-integration] <thekozitwo@gmail.com>
 *   Andrew LeCody [EasyBitcoin-PHP]
 *   Kacper Rowinski [jsonRPCClient] <krowinski@implix.com>
 *
 * @author     Monero Integrations Team <support@monerointegrations.com> (https://github.com/monero-integrations)
 * @copyright  2018
 * @license    MIT
 *
 * ============================================================================
 *
 * // See example.php for more examples
 *
 * // Initialize class
 * $daemonRPC = new daemonRPC();
 *
 * // Examples:
 * $height = $daemonRPC->getblockcount();
 * $block = $daemonRPC->getblock_by_height(1);
 *
 */

namespace BrianHenryIE\MoneroDaemonRpc;

use BrianHenryIE\MoneroDaemonRpc\Model\AltBlocksHashes;
use BrianHenryIE\MoneroDaemonRpc\Model\BlockCount;
use BrianHenryIE\MoneroDaemonRpc\Model\BlockHeaderBy;
use BrianHenryIE\MoneroDaemonRpc\Model\Info;
use BrianHenryIE\MoneroDaemonRpc\Model\InPeers;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\AltBlocksHashesMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\BlockCountMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\BlockHeaderByMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\InfoMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\InPeersMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\LimitMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\MiningStatusMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\PeerListMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\StatusMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper\TransactionPoolStatsMapper;
use BrianHenryIE\MoneroDaemonRpc\Model\Limit;
use BrianHenryIE\MoneroDaemonRpc\Model\MiningStatus;
use BrianHenryIE\MoneroDaemonRpc\Model\PeerList;
use BrianHenryIE\MoneroDaemonRpc\Model\Status;
use BrianHenryIE\MoneroDaemonRpc\Model\TransactionPoolStats;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use JsonMapper\Enums\TextNotation;
use JsonMapper\JsonMapperFactory;
use JsonMapper\Middleware\CaseConversion;
use SimPod\JsonRpc\Extractor\ResponseExtractor;
use SimPod\JsonRpc\HttpJsonRpcRequestFactory;
use stdClass;

class DaemonRpcClient
{
    protected string $url;

  /**
   *
   * Start a connection with the Monero daemon (monerod)
   *
   * @param  string  $host      Monero daemon IP hostname
   * @param  int     $port      Monero daemon port
   * @param  bool  $ssl  Monero daemon protocol (eg. 'http')
   * @param  ?string  $username      Monero daemon RPC username
   * @param  ?string  $password  Monero daemon RPC passphrase
   *
   */
    public function __construct(
        string $host = '127.0.0.1',
        int $port = 18081,
        bool $ssl = true,
        ?string $username = null,
        ?string $password = null
    ) {
        $this->url = sprintf(
            'http%s://%s:%d/',
            $ssl ? 's' : '',
            $host,
            $port
        );
    }

  /**
   * Execute RPC command.
   *
   * @template T of object
   * @param  string  $method  RPC method to call.
   * @param  ?array  $params  Parameters to pass.
   * @param  string  $path    Path of API (by default "json_rpc").
   * @param class-string<T> $type The object type to cast/deserialize the response to.
   *
   * @return T
   */
    protected function run(?string $method, ?array $params = null, $path = 'json_rpc', string $type = stdClass::class)
    {
        $path = !empty($path) ? $path : 'json_rpc';

        $httpRequestFactory = new HttpFactory();
        $rpcRequestFactory = new HttpJsonRpcRequestFactory($httpRequestFactory);

        $id = null;
        $request = $rpcRequestFactory->request($id, $method ?? '', $params);

        $uri = $httpRequestFactory->createUri($this->url . $path);
        $request = $request->withUri($uri);

        // TODO: Credentials.

        $client = new Client();

        $response = $client->sendRequest($request);
        $extracted = new ResponseExtractor($response);

        $mapper = (new JsonMapperFactory())->bestFit();

        $mapper->push(new CaseConversion(TextNotation::UNDERSCORE(), TextNotation::CAMEL_CASE()));

        $data = $path === 'json_rpc' ? json_encode($extracted->getResult()) : (string) $response->getBody() ;

        return $mapper->mapToClassFromString($data, $type ?? stdClass::class);
    }

  /**
   *
   * Look up how many blocks are in the longest chain known to the node
   *
   *
   * Example: {
   *   "count": 993163,
   *   "status": "OK"
   * }
   *
   */
    public function getBlockCount(): BlockCount
    {
        return $this->run('getblockcount', null, null, BlockCountMapper::class);
    }

  /**
   *
   * Look up a block's hash by its height
   *
   * @param  number  $height   Height of block to look up
   *
   * @return string  Example: 'e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6'
   *
   */
    public function onGetBlockHash($height)
    {
        $params = array($height);

        return $this->run('on_getblockhash', $params);
    }

  /**
   *
   * Construct a block template that can be mined upon
   *
   * @param  string  $walletAddress  Address of wallet to receive coinbase transactions if block is successfully mined
   * @param  int     $reserveSize    Reserve size
   *
   * Example: {
   *   "blocktemplate_blob": "01029af88cb70568b84a11dc9406ace9e635918ca03b008f7728b9726b327c1b482a98d81ed83000000000018bd03c01ffcfcf3c0493d7cec7020278dfc296544f139394e5e045fcda1ba2cca5b69b39c9ddc90b7e0de859fdebdc80e8eda1ba01029c5d518ce3cc4de26364059eadc8220a3f52edabdaf025a9bff4eec8b6b50e3d8080dd9da417021e642d07a8c33fbe497054cfea9c760ab4068d31532ff0fbb543a7856a9b78ee80c0f9decfae01023ef3a7182cb0c260732e7828606052a0645d3686d7a03ce3da091dbb2b75e5955f01ad2af83bce0d823bf3dbbed01ab219250eb36098c62cbb6aa2976936848bae53023c00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001f12d7c87346d6b84e17680082d9b4a1d84e36dd01bd2c7f3b3893478a8d88fb3",
   *   "difficulty": 982540729,
   *   "height": 993231,
   *   "prev_hash": "68b84a11dc9406ace9e635918ca03b008f7728b9726b327c1b482a98d81ed830",
   *   "reserved_offset": 246,
   *   "status": "OK"
   * }
   *
   */
    public function getBlockTemplate($walletAddress, $reserveSize)
    {
        $params = array( 'wallet_address' => $walletAddress, 'reserve_size' => $reserveSize);

        return $this->client->_run('getblocktemplate', $params, null);
    }

  /**
   *
   * Submit a mined block to the network
   *
   * @param  string  $block  Block blob
   *
   * @return // TODO: example
   *
   */
    public function submitBlock($block)
    {
        return $this->run('submitblock', $block);
    }

  /**
   *
   * Look up the block header of the latest block in the longest chain known to the node
   *
   * Example: {
   *   "block_header": {
   *     "depth": 0,
   *     "difficulty": 746963928,
   *     "hash": "ac0f1e226268d45c99a16202fdcb730d8f7b36ea5e5b4a565b1ba1a8fc252eb0",
   *     "height": 990793,
   *     "major_version": 1,
   *     "minor_version": 1,
   *     "nonce": 1550,
   *     "orphan_status": false,
   *     "prev_hash": "386575e3b0b004ed8d458dbd31bff0fe37b280339937f971e06df33f8589b75c",
   *     "reward": 6856609225169,
   *     "timestamp": 1457589942
   *   },
   *   "status": "OK"
   * }
   *
   */
    public function getLastBlockHeader(): BlockHeaderBy
    {
        return $this->run('getlastblockheader', null, null, \BlockHeaderByMapper::class);
    }

  /**
   *
   * Look up a block header from a block hash
   *
   * @param  string  $hash  The block's SHA256 hash
   *
   * Example: {
   *   "block_header": {
   *     "depth": 78376,
   *     "difficulty": 815625611,
   *     "hash": "e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6",
   *     "height": 912345,
   *     "major_version": 1,
   *     "minor_version": 2,
   *     "nonce": 1646,
   *     "orphan_status": false,
   *     "prev_hash": "b61c58b2e0be53fad5ef9d9731a55e8a81d972b8d90ed07c04fd37ca6403ff78",
   *     "reward": 7388968946286,
   *     "timestamp": 1452793716
   *   },
   *   "status": "OK"
   * }
   *
   */
    public function getBlockHeaderByHash($hash): BlockHeaderBy
    {
        $params = array('hash' => $hash);

        return $this->run('getblockheaderbyhash', $params, null, BlockHeaderByMapper::class);
    }

  /**
   *
   * Look up a block header by height
   *
   * @param  int     $height  Height of block
   *
   * Example: {
   *   "block_header": {
   *     "depth": 78376,
   *     "difficulty": 815625611,
   *     "hash": "e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6",
   *     "height": 912345,
   *     "major_version": 1,
   *     "minor_version": 2,
   *     "nonce": 1646,
   *     "orphan_status": false,
   *     "prev_hash": "b61c58b2e0be53fad5ef9d9731a55e8a81d972b8d90ed07c04fd37ca6403ff78",
   *     "reward": 7388968946286,
   *     "timestamp": 1452793716
   *   },
   *   "status": "OK"
   * }
   *
   */
    public function getBlockHeaderByHeight($height): BlockHeaderBy
    {
        return $this->run('getblockheaderbyheight', $height, null, BlockHeaderByMapper::class);
    }

  /**
   *
   * Look up block information by SHA256 hash
   *
   * @param  string  $hash  SHA256 hash of block
   *
   * Example: {
   *   "blob": "...",
   *   "block_header": {
   *     "depth": 12,
   *     "difficulty": 964985344,
   *     "hash": "510ee3c4e14330a7b96e883c323a60ebd1b5556ac1262d0bc03c24a3b785516f",
   *     "height": 993056,
   *     "major_version": 1,
   *     "minor_version": 2,
   *     "nonce": 2036,
   *     "orphan_status": false,
   *     "prev_hash": "0ea4af6547c05c965afc8df6d31509ff3105dc7ae6b10172521d77e09711fd6d",
   *     "reward": 6932043647005,
   *     "timestamp": 1457720227
   *   },
   *   "json": "...",
   *   "status": "OK"
   * }
   *
   */
    public function getBlockByHash($hash)
    {
        $params = array('hash' => $hash);

        return $this->run('getblock', $params);
    }

  /**
   *
   * Look up block information by height
   *
   * @param  int     $height  Height of block
   *
   * Example: {
   *   "blob": "...",
   *   "block_header": {
   *     "depth": 80694,
   *     "difficulty": 815625611,
   *     "hash": "e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6",
   *     "height": 912345,
   *     "major_version": 1,
   *     "minor_version": 2,
   *     "nonce": 1646,
   *     "orphan_status": false,
   *     "prev_hash": "b61c58b2e0be53fad5ef9d9731a55e8a81d972b8d90ed07c04fd37ca6403ff78",
   *     "reward": 7388968946286,
   *     "timestamp": 1452793716
   *   },
   *   "json": "...",
   *   "status": "OK"
   * }
   *
   */
    public function getBlockByHeight($height)
    {
        $params = array('height' => $height);

        return $this->run('getblock', $params);
    }

  /**
   *
   * Look up incoming and outgoing connections to your node
   *
   * Example: {
   *   "connections": [{
   *     "avg_download": 0,
   *     "avg_upload": 0,
   *     "current_download": 0,
   *     "current_upload": 0,
   *     "incoming": false,
   *     "ip": "76.173.170.133",
   *     "live_time": 1865,
   *     "local_ip": false,
   *     "localhost": false,
   *     "peer_id": "3bfe29d6b1aa7c4c",
   *     "port": "18080",
   *     "recv_count": 116396,
   *     "recv_idle_time": 23,
   *     "send_count": 176893,
   *     "send_idle_time": 1457726610,
   *     "state": "state_normal"
   *   },{
   *   ..
   *   }],
   *   "status": "OK"
   * }
   *
   */
    public function getConnections()
    {
        return $this->run('get_connections');
    }

  /**
   *
   * Look up general information about the state of your node and the network
   *
   * @param  none
   *
   * Example: {
   *   "alt_blocks_count": 5,
   *   "difficulty": 972165250,
   *   "grey_peerlist_size": 2280,
   *   "height": 993145,
   *   "incoming_connections_count": 0,
   *   "outgoing_connections_count": 8,
   *   "status": "OK",
   *   "target": 60,
   *   "target_height": 993137,
   *   "testnet": false,
   *   "top_block_hash": "",
   *   "tx_count": 564287,
   *   "tx_pool_size": 45,
   *   "white_peerlist_size": 529
   * }
   *
   */
    public function getInfo(): Info
    {
        return $this->run('get_info', null, null, InfoMapper::class);
    }

  /**
   *
   * Look up information regarding hard fork voting and readiness
   *
   *
   * Example: {
   *   "alt_blocks_count": 0,
   *   "block_size_limit": 600000,
   *   "block_size_median": 85,
   *   "bootstrap_daemon_address": ?,
   *   "cumulative_difficulty": 40859323048,
   *   "difficulty": 57406,
   *   "free_space": 888592449536,
   *   "grey_peerlist_size": 526,
   *   "height": 1066107,
   *   "height_without_bootstrap": 1066107,
   *   "incoming_connections_count": 1,
   *   "offline":  ?,
   *   "outgoing_connections_count": 1,
   *   "rpc_connections_count": 1,
   *   "start_time": 1519963719,
   *   "status": OK,
   *   "target": 120,
   *   "target_height": 1066073,
   *   "testnet": 1,
   *   "top_block_hash": e438aae56de8e5e5c8e0d230167fcb58bc8dde09e369ff7689a4af146040a20e,
   *   "tx_count": 52632,
   *   "tx_pool_size": 0,
   *   "untrusted": ?,
   *   "was_bootstrap_ever_used: ?,
   *   "white_peerlist_size": 5
   * }
   *
   */
    public function getHardForkInfo()
    {
        return $this->run('hard_fork_info');
    }

  /**
   *
   * Ban another node by IP
   *
   * @param  array  $bans  Array of IP addresses to ban
   *
   * Example: {
   *   "status": "OK"
   * }
   *
   */
    public function setBans($bans)
    {
        if (is_string($bans)) {
            $bans = array($bans);
        }
        $params = array('bans' => $bans);

        return $this->run('set_bans', $params);
    }

  /**
   *
   * Get list of banned IPs
   *
   * Example: {
   *   "bans": [{
   *     "ip": 838969536,
   *     "seconds": 1457748792
   *   }],
   *   "status": "OK"
   * }
   *
   */
    public function getBans(): Status
    {
        return $this->run('get_bans', null, null, StatusMapper::class);
    }

  /**
   * Flush Transaction Pool
   *
   * @param $txids - array
   * Optional, list of transactions IDs to flush from pool (all tx ids flushed if empty).
   *
   * @return array status - string; General RPC error code. "OK" means everything looks good.
   */
    public function flushTxPool($txids)
    {
        return $this->run('flush_txpool', $txids);
    }

    /**
     * Get height
     *
     */
    public function getHeight()
    {
        return $this->run(null, null, 'getheight');
    }

   /**
    *
    * Get transactions
    *
    */
    public function getTransactions($txsHashes = null)
    {
        $params = array( 'txs_hashes' => $txsHashes, 'decode_as_json' => true);
        return $this->run(null, null, 'gettransactions');
    }


    public function getAltBlocksHashes(): AltBlocksHashes
    {
        return $this->run(null, null, 'get_alt_blocks_hashes', AltBlocksHashesMapper::class);
    }

    public function isKeyImageSpent($keyImages)
    {
        if (is_string($keyImages)) {
            $keyImages = array($keyImages);
        }
        if (!is_array($keyImages)) {
            throw new Exception('Error: key images must be an array or a string');
        }
        $params = array('key_images' => $keyImages);
        return $this->run(null, $params, 'is_key_image_spent');
    }

    public function sendRawTransaction($txAsHex, $doNotRelay = false, $doSanityChecks = true)
    {
        $params = array( 'tx_as_hex' => $txAsHex, 'do_not_relay' => $doNotRelay, 'do_sanity_checks' => $doSanityChecks);
        return $this->run(null, $params, 'send_raw_transaction');
    }

    public function startMining($backgroundMining, bool $ignoreBattery, $minerAddress, int $threadsCount = 1)
    {
        if ($threadsCount < 0) {
            trigger_error('Error: threads_count must be a positive integer', E_USER_WARNING);
            $threadsCount = 1;
        }
        $params = array(
            'do_background_mining' => $backgroundMining,
            'ignore_battery' => $ignoreBattery,
            'miner_address' => $minerAddress,
            'threads_count' => $threadsCount
        );
        return $this->run(null, $params, 'start_mining');
    }

    public function stopMining(): Status
    {
        return $this->run(null, null, 'stop_mining', StatusMapper::class);
    }

    public function miningStatus(): MiningStatus
    {
        return $this->run(null, null, 'mining_status', MiningStatusMapper::class);
    }

    public function saveBc(): Status
    {
        return $this->run(null, null, 'save_bc', StatusMapper::class);
    }

    public function getPeerList($publicOnly = true): PeerList
    {
        $params = array('public_only' => $publicOnly);
        return $this->run(null, $params, 'get_peer_list', PeerListMapper::class);
    }

    public function setLogHashRate($visible = true)
    {
        $params = array('visible' => $visible);
        return $this->run(null, $params, 'set_log_hash_rate');
    }

    public function setLogLevel($logLevel = 0)
    {
        if (!is_int($logLevel)) {
            throw new Exception('Error: log_level must be an integer');
        }
        $params = array('level' => $logLevel);
        return $this->run(null, $params, 'set_log_level');
    }

    public function setLogCategories($category)
    {
        $params = array('categories' => $category);
        return $this->run(null, $params, 'set_log_categories');
    }

    public function getTransactionPool()
    {
        return $this->run(null, null, 'get_transaction_pool');
    }

    public function getTransactionPoolStats(): TransactionPoolStats
    {
        return $this->run(null, null, 'get_transaction_pool_stats', TransactionPoolStatsMapper::class);
    }

    public function stopDaemon(): Status
    {
        return $this->run(null, null, 'stop_daemon', StatusMapper::class);
    }

    public function getLimit(): Limit
    {
        return $this->run(null, null, 'get_limit', LimitMapper::class);
    }

    public function setLimit($limitDown, $limitUp): Limit
    {
        $params = array( 'limit_down' => $limitDown, 'limit_up' => $limitUp);
        return $this->run(null, $params, 'set_limit', LimitMapper::class);
    }

    public function outPeers()
    {
        return $this->run(null, null, 'out_peers');
    }

    public function inPeers(): InPeers
    {
        return $this->run(null, null, 'in_peers', InPeersMapper::class);
    }

    public function startSaveGraph()
    {
        return $this->run(null, null, 'start_save_graph');
    }

    public function stopSaveGraph()
    {
        return $this->run(null, null, 'stop_save_graph');
    }

    public function getOuts($outputs)
    {
        $params = array('outputs' => $outputs);
        return $this->run(null, null, 'get_outs');
    }
}
