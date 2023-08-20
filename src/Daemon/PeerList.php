<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface PeerList extends ResponseBase
{
    /**
     * 5000
     *
     * @return PeerListEntry[]
     */
    public function getGrayList(): array;

    /**
     * @return PeerListEntry[]
     */
    public function getWhiteList(): array;
}
