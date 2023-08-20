<?php

namespace BrianHenryIE\MoneroRpc\Daemon\JsonMapper;

use BrianHenryIE\MoneroRpc\Daemon\InPeers;

class InPeersMapper implements InPeers
{
    use ResponseBaseTrait;

    protected int $inPeers;

    public function getInPeers(): int
    {
        return $this->inPeers;
    }

    public function setInPeers(int $inPeers): void
    {
        $this->inPeers = $inPeers;
    }
}
