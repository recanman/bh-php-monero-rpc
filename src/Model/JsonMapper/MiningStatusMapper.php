<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model\JsonMapper;

use BrianHenryIE\MoneroDaemonRpc\Model\MiningStatus;

class MiningStatusMapper implements MiningStatus
{
    use ResponseBaseTrait;

    protected bool $active;
    protected string $address;
    protected int $bgIdleThreshold;
    protected bool $bgIgnoreBattery;
    protected int $bgMinIdleSeconds;
    protected int $bgTarget;
    protected int $blockReward;
    protected int $blockTarget;
    protected int $difficulty;
    protected int $difficultyTop64;
    protected bool $isBackgroundMiningEnabled;
    protected string $powAlgorithm;
    protected int $speed;
    protected string $status;
    protected int $threadsCount;
    protected bool $untrusted;
    protected string $wideDifficulty;

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getBgIdleThreshold(): int
    {
        return $this->bgIdleThreshold;
    }

    public function getBgIgnoreBattery(): bool
    {
        return $this->bgIgnoreBattery;
    }

    public function getBgMinIdleSeconds(): int
    {
        return $this->bgMinIdleSeconds;
    }

    public function getBgTarget(): int
    {
        return $this->bgTarget;
    }

    public function getBlockReward(): int
    {
        return $this->blockReward;
    }

    public function getBlockTarget(): int
    {
        return $this->blockTarget;
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function getDifficultyTop64(): int
    {
        return $this->difficultyTop64;
    }

    public function getIsBackgroundMiningEnabled(): bool
    {
        return $this->isBackgroundMiningEnabled;
    }

    public function getPowAlgorithm(): string
    {
        return $this->powAlgorithm;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getThreadsCount(): int
    {
        return $this->threadsCount;
    }

    public function getUntrusted(): bool
    {
        return $this->untrusted;
    }

    public function getWideDifficulty(): string
    {
        return $this->wideDifficulty;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setBgIdleThreshold(int $bgIdleThreshold): void
    {
        $this->bgIdleThreshold = $bgIdleThreshold;
    }

    public function setBgIgnoreBattery(bool $bgIgnoreBattery): void
    {
        $this->bgIgnoreBattery = $bgIgnoreBattery;
    }

    public function setBgMinIdleSeconds(int $bgMinIdleSeconds): void
    {
        $this->bgMinIdleSeconds = $bgMinIdleSeconds;
    }

    public function setBgTarget(int $bgTarget): void
    {
        $this->bgTarget = $bgTarget;
    }

    public function setBlockReward(int $blockReward): void
    {
        $this->blockReward = $blockReward;
    }

    public function setBlockTarget(int $blockTarget): void
    {
        $this->blockTarget = $blockTarget;
    }

    public function setDifficulty(int $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function setDifficultyTop64(int $difficultyTop64): void
    {
        $this->difficultyTop64 = $difficultyTop64;
    }

    public function setIsBackgroundMiningEnabled(bool $isBackgroundMiningEnabled): void
    {
        $this->isBackgroundMiningEnabled = $isBackgroundMiningEnabled;
    }

    public function setPowAlgorithm(string $powAlgorithm): void
    {
        $this->powAlgorithm = $powAlgorithm;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setThreadsCount(int $threadsCount): void
    {
        $this->threadsCount = $threadsCount;
    }

    public function setUntrusted(bool $untrusted): void
    {
        $this->untrusted = $untrusted;
    }

    public function setWideDifficulty(string $wideDifficulty): void
    {
        $this->wideDifficulty = $wideDifficulty;
    }
}
