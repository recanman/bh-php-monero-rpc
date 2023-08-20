<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

use BrianHenryIE\MoneroRpc\Model\PeerList;
use BrianHenryIE\MoneroRpc\Model\PeerListEntry;

class PeerListMapper implements PeerList
{
    use ResponseBaseTrait;

    /** @var PeerListEntryMapper[] */
    protected array $grayList;

    /** @var PeerListEntryMapper[] */
    protected array $whiteList;

    /**
     * @return PeerListEntry[]
     */
    public function getGrayList(): array
    {
        return $this->grayList;
    }

    /**
     * @return PeerListEntry[]
     */
    public function getWhiteList(): array
    {
        return $this->whiteList;
    }

    /**
     * @param PeerListEntryMapper[] $grayList
     */
    public function setGrayList(array $grayList): void
    {
        $this->grayList = $grayList;
    }

    /**
     * @param PeerListEntryMapper[] $whiteList
     */
    public function setWhiteList(array $whiteList): void
    {
        $this->whiteList = $whiteList;
    }
}
