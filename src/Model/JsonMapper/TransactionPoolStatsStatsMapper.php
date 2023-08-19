<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\TransactionPoolStatsStats;

class TransactionPoolStatsStatsMapper implements TransactionPoolStatsStats
{
    protected int $bytesMax;
    protected int $bytesMed;
    protected int $bytesMin;
    protected int $bytesTotal;
    protected int $feeTotal;
    protected int $histo98pc;
    protected int $num10m;
    protected int $numDoubleSpends;
    protected int $numFailing;
    protected int $numNotRelayed;
    protected int $oldest;
    protected int $txsTotal;

    public function getBytesMax(): int
    {
        return $this->bytesMax;
    }

    public function getBytesMed(): int
    {
        return $this->bytesMed;
    }

    public function getBytesMin(): int
    {
        return $this->bytesMin;
    }

    public function getBytesTotal(): int
    {
        return $this->bytesTotal;
    }

    public function getFeeTotal(): int
    {
        return $this->feeTotal;
    }

    public function getHisto98pc(): int
    {
        return $this->histo98pc;
    }

    public function getNum10m(): int
    {
        return $this->num10m;
    }

    public function getNumDoubleSpends(): int
    {
        return $this->numDoubleSpends;
    }

    public function getNumFailing(): int
    {
        return $this->numFailing;
    }

    public function getNumNotRelayed(): int
    {
        return $this->numNotRelayed;
    }

    public function getOldest(): int
    {
        return $this->oldest;
    }

    public function getTxsTotal(): int
    {
        return $this->txsTotal;
    }

    public function setBytesMax(int $bytesMax): void
    {
        $this->bytesMax = $bytesMax;
    }

    public function setBytesMed(int $bytesMed): void
    {
        $this->bytesMed = $bytesMed;
    }

    public function setBytesMin(int $bytesMin): void
    {
        $this->bytesMin = $bytesMin;
    }

    public function setBytesTotal(int $bytesTotal): void
    {
        $this->bytesTotal = $bytesTotal;
    }

    public function setFeeTotal(int $feeTotal): void
    {
        $this->feeTotal = $feeTotal;
    }

    public function setHisto98pc(int $histo98pc): void
    {
        $this->histo98pc = $histo98pc;
    }

    public function setNum10m(int $num10m): void
    {
        $this->num10m = $num10m;
    }

    public function setNumDoubleSpends(int $numDoubleSpends): void
    {
        $this->numDoubleSpends = $numDoubleSpends;
    }

    public function setNumFailing(int $numFailing): void
    {
        $this->numFailing = $numFailing;
    }

    public function setNumNotRelayed(int $numNotRelayed): void
    {
        $this->numNotRelayed = $numNotRelayed;
    }

    public function setOldest(int $oldest): void
    {
        $this->oldest = $oldest;
    }

    public function setTxsTotal(int $txsTotal): void
    {
        $this->txsTotal = $txsTotal;
    }
}
