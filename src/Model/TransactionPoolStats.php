<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface TransactionPoolStats extends Status
{
    public function getCredits(): int;

    public function getPoolStats(): TransactionPoolStatsStats;

    public function getTopHash(): string;
}
