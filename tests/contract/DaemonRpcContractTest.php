<?php

/**
 * Contract tests.
 *
 * Ensure behaviour does not change after refactoring.
 *
 * @see https://github.com/monerodocs/md/blob/master/docs/interacting/monerod-reference.md
 * @see https://github.com/monero-project/monero/blob/master/src/daemon/command_server.cpp
 *
 * @package brianhenryie/bh-php-monero-daemon-rpc
 */

namespace BrianHenryIE\MoneroDaemonRpc;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \BrianHenryIE\MoneroDaemonRpc\DaemonRpcClient
 */
class DaemonRpcContractTest extends TestCase
{
    protected static DaemonRpcClient $rpcClient;

    /**
     * moneord --rpc-bind-port arg (=18081, 28081 if 'testnet', 38081 if 'stagenet')
     */
    public static function setUpBeforeClass(): void
    {
        self::$rpcClient = new DaemonRpcClient(
            new HttpFactory(),
	        new HttpFactory(),
            new Client(),
            '127.0.0.1',
            DaemonRpcClient::TESTNET_PORT,
            false
        );
        try {
            self::$rpcClient->miningStatus();
        } catch (\Exception $exception) {
            self::markTestSkipped('Daemon not running.');
        }
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getDaemonRpcClient(): DaemonRpcClient
    {
        return self::$rpcClient;
    }

    public function testCollectTestData(): void
    {
        $this->markTestSkipped('only for saving test data');

        $daemonRpc = $this->getDaemonRpcClient();

        // Have data:
//      $daemonRpc->getBans();
//        $daemonRpc->getInfo();
//        $daemonRpc->getBlockHeaderByHeight(2891820);
//        $daemonRpc->getLastBlockHeader();
//        $daemonRpc->getAltBlocksHashes();
//        $daemonRpc->stopMining();
//        $daemonRpc->miningStatus();
//        $daemonRpc->saveBc();
//        $daemonRpc->getPeerList();
//        $daemonRpc->getTransactionPoolStats();
//        $daemonRpc->stopDaemon();
//        $daemonRpc->inPeers();
//        $daemonRpc->getLimit();
//        $daemonRpc->getBlockHeaderByHash('5b544791d319a5ae2551c26dc592ebad0b9afe4fcaf4dc087508f902f1f43670');
//        $daemonRpc->setLimit( 8192, 2048 );

//      // Both returned json_rpc-getblock.json
//        $daemonRpc->getBlockByHeight( 2891820 );
//        $daemonRpc->getBlockByHash('5b544791d319a5ae2551c26dc592ebad0b9afe4fcaf4dc087508f902f1f43670');

        // Need more info:
//        $daemonRpc->isKeyImageSpent();
//        $daemonRpc->setLogCategories();
//        $daemonRpc->getOuts();

//       404
//      $daemonRpc->startSaveGraph();
//        $daemonRpc->stopSaveGraph();
    }

    public function testGetBlockCount(): void
    {
        $daemonRpc = $this->getDaemonRpcClient();

        $height = (int) $this->extractFromCli(
            'monerod --testnet print_height',
            '/(\d+)$/'
        );

        $result = $daemonRpc->getBlockCount();

        self::assertSame($height, $result->getCount());
    }

    public function testLimit(): void
    {
        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getLimit();

        self::assertEquals(8192, $result->getLimitDown());
    }

    public function testGetBans(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getBans();

        self::assertEquals('OK', $result->getStatus());
        self::assertEquals(false, $result->getUntrusted());
    }

    public function testGetInfo(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getInfo();

        self::assertEquals(600000, $result->getBlockSizeLimit());
        self::assertEquals(false, $result->getUpdateAvailable());
    }

    public function testGetBlock(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getBlockByHash('41aea45eb8e6f627f3d9980de9f2048116bec00b4bd15b669d484681e881f6ef');

        self::assertEquals('994854e739b86fe37a057b7e7069b13c62cc0b375d3bd3fa65d8670942a2e4a6', $result->minerTxHash);
    }

    public function testGetBlockHeaderByHash(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getBlockHeaderByHash('41aea45eb8e6f627f3d9980de9f2048116bec00b4bd15b669d484681e881f6ef');

        self::assertEquals(18289227130, $result->getBlockHeader()->getCumulativeDifficulty());
        self::assertEquals('994854e739b86fe37a057b7e7069b13c62cc0b375d3bd3fa65d8670942a2e4a6', $result->getBlockHeader()->getMinerTxHash());
        self::assertEquals(false, $result->getBlockHeader()->getOrphanStatus());
    }

    public function testGetMiningStatus(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->miningStatus();

        self::assertEquals(false, $result->getActive());
        self::assertEquals(false, $result->getIsBackgroundMiningEnabled());
        self::assertEquals(false, $result->getBgIgnoreBattery());
    }

    public function testStopMining(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->stopMining();

        self::assertEquals('Mining never started', $result->getStatus());
        self::assertEquals(false, $result->getUntrusted());
    }

    public function testOnGetBlockHash(): void
    {
        $daemonRpc = $this->getDaemonRpcClient();

        $height = $daemonRpc->getBlockCount()->getCount() - 10;

        $expected = $this->extractFromCli("monerod --testnet print_block $height", '/\nhash: (.*)\n/');

        $result = $daemonRpc->onGetBlockHash($height);

        self::assertEquals($expected, $result);
    }

    /**
     * E.g. `monerod --testnet print_block`
     */
    private function extractFromCli(string $monerodCliCommand, string $regex): string
    {
        $shell = shell_exec($monerodCliCommand);

        $shell = trim($this->stripAnsi($shell));

        preg_match($regex, $shell, $matches);

        return $matches[1];
    }

    /**
     * Surprisingly, there is nothing on Packagist to remove ANSI codes from a string.
     */
    private function stripAnsi(string $from): string
    {
        $ansi = [
            '[0;36m',
            '[0m',
            '[?2004h',
            '[?2004l',
        ];

        return str_replace($ansi, '', $from);
    }
}
