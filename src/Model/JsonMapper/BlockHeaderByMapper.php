<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\BlockHeader;
use BrianHenryIE\MoneroDaemonRpc\Model\BlockHeaderBy;

class BlockHeaderByMapper implements BlockHeaderBy
{
    use StatusTrait;

    protected BlockHeaderMapper $blockHeader;
    protected int $credits;
    protected string $topHash;

    public function getBlockHeader(): BlockHeader
    {
        return $this->blockHeader;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getTopHash(): string
    {
        return $this->topHash;
    }

    public function setBlockHeader(BlockHeaderMapper $blockHeader): void
    {
        $this->blockHeader = $blockHeader;
    }

    public function setCredits(int $credits): void
    {
        $this->credits = $credits;
    }


    public function setTopHash(string $topHash): void
    {
        $this->topHash = $topHash;
    }
}
