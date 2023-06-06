<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface PeerList extends Status
{
    /**
     * @return PeerListEntry[]
     */
    public function getGrayList(): array;

    /**
     * @return PeerListEntry[]
     */
    public function getWhiteList(): array;
}
