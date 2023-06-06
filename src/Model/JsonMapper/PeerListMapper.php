<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\PeerList;

class PeerListMapper implements PeerList
{
    use StatusTrait;

    /** @var PeerListEntryMapper[] */
    protected array $grayList;
    /** @var PeerListEntryMapper[] */
    protected array $whiteList;

    /**
     * @return PeerListEntryMapper[]
     */
    public function getGrayList(): array
    {
        return $this->grayList;
    }

    /**
     * @return PeerListEntryMapper[]
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
