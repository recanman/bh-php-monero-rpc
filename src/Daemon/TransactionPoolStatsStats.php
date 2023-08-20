<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface TransactionPoolStatsStats
{
    public function getBytesMax(): int;

    public function getBytesMed(): int;

    public function getBytesMin(): int;

    public function getBytesTotal(): int;

    public function getFeeTotal(): int;

    public function getHisto98pc(): int;

    public function getNum10m(): int;

    public function getNumDoubleSpends(): int;

    public function getNumFailing(): int;

    public function getNumNotRelayed(): int;

    public function getOldest(): int;

    public function getTxsTotal(): int;
}
