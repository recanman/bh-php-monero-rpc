<?php

namespace BrianHenryIE\MoneroRpc\Daemon\JsonMapper;

use BrianHenryIE\MoneroRpc\Daemon\BlockCount;

class BlockCountMapper implements BlockCount
{
    use ResponseBaseTrait;

    protected int $count;

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }
}
