<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\PeerListEntry;

class PeerListEntryMapper implements PeerListEntry
{
    protected string $host;
    protected int $id;
    protected int $ip;
    protected int $lastSeen;
    protected int $port;
    protected ?int $pruningSeed;
    protected ?int $rpcPort;
    protected ?int $rpcCreditsPerHash;

    public function getHost(): string
    {
        return $this->host;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIp(): int
    {
        return $this->ip;
    }

    public function getLastSeen(): int
    {
        return $this->lastSeen;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getPruningSeed(): ?int
    {
        return $this->pruningSeed;
    }

    public function getRpcPort(): ?int
    {
        return $this->rpcPort;
    }

    public function getRpcCreditsPerHash(): ?int
    {
        return $this->rpcCreditsPerHash;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setIp(int $ip): void
    {
        $this->ip = $ip;
    }

    public function setLastSeen(int $lastSeen): void
    {
        $this->lastSeen = $lastSeen;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function setPruningSeed(?int $pruningSeed): void
    {
        $this->pruningSeed = $pruningSeed;
    }

    public function setRpcPort(?int $rpcPort): void
    {
        $this->rpcPort = $rpcPort;
    }

    public function setRpcCreditsPerHash(?int $rpcCreditsPerHash): void
    {
        $this->rpcCreditsPerHash = $rpcCreditsPerHash;
    }
}
