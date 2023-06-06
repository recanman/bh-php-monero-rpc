<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\TransactionPoolStats;
use BrianHenryIE\MoneroDaemonRpc\Model\TransactionPoolStatsStats;

class TransactionPoolStatsMapper implements TransactionPoolStats
{
    use StatusTrait;

    protected int $credits;
    protected TransactionPoolStatsStats $poolStats;
    protected string $topHash;

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getPoolStats(): TransactionPoolStatsStats
    {
        return $this->poolStats;
    }

    public function getTopHash(): string
    {
        return $this->topHash;
    }

    public function setCredits(int $credits): void
    {
        $this->credits = $credits;
    }

    public function setPoolStats(TransactionPoolStatsStats $poolStats): void
    {
        $this->poolStats = $poolStats;
    }

    public function setTopHash(string $topHash): void
    {
        $this->topHash = $topHash;
    }
}
