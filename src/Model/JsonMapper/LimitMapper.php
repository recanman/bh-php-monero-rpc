<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\Limit;

class LimitMapper implements Limit
{
    use StatusTrait;

    protected int $limitDown;
    protected int $limitUp;

    public function getLimitDown(): int
    {
        return $this->limitDown;
    }

    public function getLimitUp(): int
    {
        return $this->limitUp;
    }

    public function setLimitDown(int $limitDown): void
    {
        $this->limitDown = $limitDown;
    }

    public function setLimitUp(int $limitUp): void
    {
        $this->limitUp = $limitUp;
    }
}
