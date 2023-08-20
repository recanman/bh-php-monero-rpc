<?php

namespace BrianHenryIE\MoneroDaemonRpc;

use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use PsrMock\Psr17\RequestFactory;
use PsrMock\Psr17\StreamFactory;
use PsrMock\Psr18\Client;
use PsrMock\Psr7\Response;
use PsrMock\Psr7\Uri;

/**
 * @coversDefaultClass \BrianHenryIE\MoneroRpc\Daemon
 */
class MoneroDaemonRpcUnitTest extends TestCase
{
    private function getDaemonClient(string $path, string $responseBody): DaemonRpcClient
    {
        $httpFactory = new RequestFactory();
        $client = new Client();

        $uri = new Uri("https://127.0.0.1:18081/$path");

        $uriFactory = Mockery::mock(UriFactoryInterface::class);
        $uriFactory->shouldReceive('createUri')->andReturn($uri);

        $daemonRpcClient = new DaemonRpcClient(
            $httpFactory,
            $client,
            $uriFactory
        );

        $streamFactory = new StreamFactory();
        $responseStream = $streamFactory->createStream($responseBody);

        $response = (new Response())->withBody($responseStream);

        $client->addResponse(
            'POST',
            "https://127.0.0.1:18081/$path",
            $response
        );

        return $daemonRpcClient;
    }
    public function testMiningStatus(): void
    {
        $responseBody = <<<'EOD'
{
  "active": false,
  "address": "",
  "bg_idle_threshold": 0,
  "bg_ignore_battery": false,
  "bg_min_idle_seconds": 0,
  "bg_target": 0,
  "block_reward": 0,
  "block_target": 60,
  "difficulty": 13616,
  "difficulty_top64": 0,
  "is_background_mining_enabled": false,
  "pow_algorithm": "Cryptonight",
  "speed": 0,
  "status": "OK",
  "threads_count": 0,
  "untrusted": false,
  "wide_difficulty": "0x3530"
}
EOD;

        $daemonRpcClient = $this->getDaemonClient('mining_status', $responseBody);

        $result = $daemonRpcClient->miningStatus();

        self::assertFalse($result->getActive());
    }
}
