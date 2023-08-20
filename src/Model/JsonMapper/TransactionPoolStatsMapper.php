<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

use BrianHenryIE\MoneroRpc\Model\TransactionPoolStats;
use BrianHenryIE\MoneroRpc\Model\TransactionPoolStatsStats;

class TransactionPoolStatsMapper implements TransactionPoolStats
{
    use ResponseBaseTrait;

    protected int $credits;
    protected TransactionPoolStatsStatsMapper $poolStats;
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

    public function setPoolStats(TransactionPoolStatsStatsMapper $poolStats): void
    {
        $this->poolStats = $poolStats;
    }

    public function setTopHash(string $topHash): void
    {
        $this->topHash = $topHash;
    }
}
