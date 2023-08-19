<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface TransactionPoolStats extends ResponseBase
{
    public function getCredits(): int;

    public function getPoolStats(): TransactionPoolStatsStats;

    public function getTopHash(): string;
}
