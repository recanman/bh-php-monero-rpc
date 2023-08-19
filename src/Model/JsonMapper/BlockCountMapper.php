<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\BlockCount;

class BlockCountMapper implements BlockCount
{
    use StatusTrait;

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
