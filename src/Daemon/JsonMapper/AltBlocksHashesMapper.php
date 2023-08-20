<?php

namespace BrianHenryIE\MoneroRpc\Daemon\JsonMapper;

use BrianHenryIE\MoneroRpc\Daemon\AltBlocksHashes;

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
