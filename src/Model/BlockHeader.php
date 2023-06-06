<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface BlockHeader
{
    public function getBlockSize(): int;

    public function getBlockWeight(): int;

    public function getCumulativeDifficulty(): int;

    public function getCumulativeDifficultyTop64(): int;

    public function getDepth(): int;

    public function getDifficulty(): int;

    public function getDifficultyTop64(): int;

    public function getHash(): string;

    public function getHeight(): int;

    public function getLongTermWeight(): int;

    public function getMajorVersion(): int;

    public function getMinerTxHash(): string;

    public function getMinorVersion(): int;

    public function getNonce(): int;

    public function getNumTxes(): int;

    public function getOrphanStatus(): bool;

    public function getPowHash(): string;

    public function getPrevHash(): string;

    public function getReward(): int;

    public function getTimestamp(): int;

    public function getWideCumulativeDifficulty(): string;

    public function getWideDifficulty(): string;
}
