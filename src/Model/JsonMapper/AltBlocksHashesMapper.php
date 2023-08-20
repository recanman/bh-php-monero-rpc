<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\AltBlocksHashes;

class AltBlocksHashesMapper implements AltBlocksHashes
{
    use ResponseBaseTrait;

    protected int $credits;
    protected string $topHash;

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getTopHash(): string
    {
        return $this->topHash;
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
