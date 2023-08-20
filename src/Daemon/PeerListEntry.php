<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface PeerListEntry
{
    public function getHost(): string;

    public function getId(): int;

    public function getIp(): int;

    public function getLastSeen(): int;

    public function getPort(): int;

    public function getPruningSeed(): ?int;

    public function getRpcPort(): ?int;

    public function getRpcCreditsPerHash(): ?int;
}
