<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

use BrianHenryIE\MoneroRpc\Model\InPeers;

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
