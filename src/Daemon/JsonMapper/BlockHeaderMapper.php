<?php

namespace BrianHenryIE\MoneroRpc\Daemon\JsonMapper;

use BrianHenryIE\MoneroRpc\Daemon\BlockHeader;

class BlockHeaderMapper implements BlockHeader
{
    protected int $blockSize;
    protected int $blockWeight;
    protected int $cumulativeDifficulty;
    protected int $cumulativeDifficultyTop64;
    protected int $depth;
    protected int $difficulty;
    protected int $difficultyTop64;
    protected string $hash;
    protected int $height;
    protected int $longTermWeight;
    protected int $majorVersion;
    protected string $minerTxHash;
    protected int $minorVersion;
    protected int $nonce;
    protected int $numTxes;
    protected bool $orphanStatus;
    protected string $powHash;
    protected string $prevHash;
    protected int $reward;
    protected int $timestamp;
    protected string $wideCumulativeDifficulty;
    protected string $wideDifficulty;

    public function getBlockSize(): int
    {
        return $this->blockSize;
    }

    public function getBlockWeight(): int
    {
        return $this->blockWeight;
    }

    public function getCumulativeDifficulty(): int
    {
        return $this->cumulativeDifficulty;
    }

    public function getCumulativeDifficultyTop64(): int
    {
        return $this->cumulativeDifficultyTop64;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function getDifficultyTop64(): int
    {
        return $this->difficultyTop64;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getLongTermWeight(): int
    {
        return $this->longTermWeight;
    }

    public function getMajorVersion(): int
    {
        return $this->majorVersion;
    }

    public function getMinerTxHash(): string
    {
        return $this->minerTxHash;
    }

    public function getMinorVersion(): int
    {
        return $this->minorVersion;
    }

    public function getNonce(): int
    {
        return $this->nonce;
    }

    public function getNumTxes(): int
    {
        return $this->numTxes;
    }

    public function getOrphanStatus(): bool
    {
        return $this->orphanStatus;
    }

    public function getPowHash(): string
    {
        return $this->powHash;
    }

    public function getPrevHash(): string
    {
        return $this->prevHash;
    }

    public function getReward(): int
    {
        return $this->reward;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getWideCumulativeDifficulty(): string
    {
        return $this->wideCumulativeDifficulty;
    }

    public function getWideDifficulty(): string
    {
        return $this->wideDifficulty;
    }

    public function setBlockSize(int $blockSize): void
    {
        $this->blockSize = $blockSize;
    }

    public function setBlockWeight(int $blockWeight): void
    {
        $this->blockWeight = $blockWeight;
    }

    public function setCumulativeDifficulty(int $cumulativeDifficulty): void
    {
        $this->cumulativeDifficulty = $cumulativeDifficulty;
    }

    public function setCumulativeDifficultyTop64(int $cumulativeDifficultyTop64): void
    {
        $this->cumulativeDifficultyTop64 = $cumulativeDifficultyTop64;
    }

    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    public function setDifficulty(int $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function setDifficultyTop64(int $difficultyTop64): void
    {
        $this->difficultyTop64 = $difficultyTop64;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function setLongTermWeight(int $longTermWeight): void
    {
        $this->longTermWeight = $longTermWeight;
    }

    public function setMajorVersion(int $majorVersion): void
    {
        $this->majorVersion = $majorVersion;
    }

    public function setMinerTxHash(string $minerTxHash): void
    {
        $this->minerTxHash = $minerTxHash;
    }

    public function setMinorVersion(int $minorVersion): void
    {
        $this->minorVersion = $minorVersion;
    }

    public function setNonce(int $nonce): void
    {
        $this->nonce = $nonce;
    }

    public function setNumTxes(int $numTxes): void
    {
        $this->numTxes = $numTxes;
    }

    public function setOrphanStatus(bool $orphanStatus): void
    {
        $this->orphanStatus = $orphanStatus;
    }

    public function setPowHash(string $powHash): void
    {
        $this->powHash = $powHash;
    }

    public function setPrevHash(string $prevHash): void
    {
        $this->prevHash = $prevHash;
    }

    public function setReward(int $reward): void
    {
        $this->reward = $reward;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function setWideCumulativeDifficulty(string $wideCumulativeDifficulty): void
    {
        $this->wideCumulativeDifficulty = $wideCumulativeDifficulty;
    }

    public function setWideDifficulty(string $wideDifficulty): void
    {
        $this->wideDifficulty = $wideDifficulty;
    }
}
