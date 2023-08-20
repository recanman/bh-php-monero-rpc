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
use SimPod\JsonRpc\Extractor\ResponseExtractor;
use SimPod\JsonRpc\HttpJsonRpcRequestFactory;

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
        self::$rpcClient = new DaemonRpcClient('127.0.0.1', 28081, false);
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

        $result = $daemonRpc->getBlockByHash('5b544791d319a5ae2551c26dc592ebad0b9afe4fcaf4dc087508f902f1f43670');

        self::assertEquals('1010eeddb0a3066e7394abda6571ade320e37e3a5074210b1a084e00c0e19c25143b1fec975041ab04130002e8c0b00101ffacc0b00101a0cae8bfbf1103cb9ec5af8b39b6bbd7e6e085dfed4e62c7a1218534523b4e70320281b29cef46102b01137f0877da2d51ebb49e569c4f0b38fae6ac0b587bc6ec98e16056c2679d3d350208fc358ebe52fdfc00000ddb91d6e063fd02b6d4bc0c32737fecdb50da4a97e26e3acd7b0ed5fce42d0233e80b01731aeb853d719620c0707cf0f443fc0c04295fd172aa30acd2d8c2cb77c84a83ce60446bf5093ac2aa0fc5760bf686f2e8787b325bdae4fee086c8de8f84a3ec3039aa66458363cd4eb083ab76f73e61fd4420ac2b51b8467206fa8028350597ca7b79991d3ab38bb9af8c44785fe15101b72553f7fbf4a548708da62591ad7ee8deb75fe7523732ce1ae3f318d1d197ed670c3123ae45c8f0f210d4f8e5cb4e1894a14adab0c04c30fbb184b05fb79629748b01fc11d7b2e84bec3cc39bb8de6472e8bf9b17db6517022bde4361393d3efc0d3b5bef0b795a1376c9484e907592f55f738f3839f706ab59773d2ae84635425667fab9cf60e292f5e89132eee5ae4811c55654c96b734755275b138b6582e94a0f0f4611401402cb256fab7184f8b0738737e6072a1a32e253a37a83663fdf538bb08851d2d64ccbce2b3d382f8ad733060ee2438ee4d33fdd558a7c8bb238d023ff6e8ace689e535c8ab99ada6d4c2ddcffdfa05ba041534ffcf8b1179e441f3fd59680490e46000e6a', $result->blob);
        self::assertEquals('7c705f18639eb0cd2709ed720916ed3cdd16700e276ac580f532497ca75bdd5a', $result->minerTxHash);
        self::assertEquals('c84a83ce60446bf5093ac2aa0fc5760bf686f2e8787b325bdae4fee086c8de8f', $result->txHashes[2]);
    }

    public function testGetBlockHeaderByHash(): void
    {

        $daemonRpc = $this->getDaemonRpcClient();

        $result = $daemonRpc->getBlockHeaderByHash('5b544791d319a5ae2551c26dc592ebad0b9afe4fcaf4dc087508f902f1f43670');

        self::assertEquals(280545472328279964, $result->getBlockHeader()->getCumulativeDifficulty());
        self::assertEquals('7c705f18639eb0cd2709ed720916ed3cdd16700e276ac580f532497ca75bdd5a', $result->getBlockHeader()->getMinerTxHash());
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

	public function testOnGetBlockHash(): void {
		$daemonRpc = $this->getDaemonRpcClient();

		$height = $daemonRpc->getBlockCount()->getCount() - 10;

		$expected = $this->extractFromCli( "monerod --testnet print_block $height", '/\nhash: (.*)\n/');

		$result = $daemonRpc->onGetBlockHash($height);

		self::assertEquals($expected, $result);
	}

	/**
	 * E.g. `monerod --testnet print_block`
	 */
	private function extractFromCli( string $monerodCliCommand, string $regex ): string {
		$shell = shell_exec($monerodCliCommand);

		$shell = trim( $this->stripAnsi( $shell ) );

		preg_match( $regex, $shell, $matches );

		return $matches[1];
	}

	/**
	 * Surprisingly, there is nothing on Packagist to remove ANSI codes from a string.
	 */
	private function stripAnsi( string $from ): string {
		$ansi = [
			'[0;36m',
			'[0m',
			'[?2004h',
			'[?2004l',
		];

		return str_replace( $ansi, '', $from );
	}
}
