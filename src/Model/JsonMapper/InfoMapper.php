<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

use BrianHenryIE\MoneroRpc\Model\Info;

class InfoMapper implements Info
{
    use ResponseBaseTrait;

    protected int $adjustedTime;
    protected int $altBlocksCount;
    protected int $blockSizeLimit;
    protected int $blockSizeMedian;
    protected int $blockWeightLimit;
    protected int $blockWeightMedian;
    protected string $bootstrapDaemonAddress;
    protected bool $busySyncing;
    protected int $credits;
    protected int $cumulativeDifficulty;
    protected int $cumulativeDifficultyTop64;
    protected int $databaseSize;
    protected int $difficulty;
    protected int $difficultyTop64;
    protected int $freeSpace;
    protected int $greyPeerlistSize;
    protected int $height;
    protected int $heightWithoutBootstrap;
    protected int $incomingConnectionsCount;
    protected bool $mainnet;
    protected string $nettype;
    protected bool $offline;
    protected int $outgoingConnectionsCount;
    protected bool $restricted;
    protected int $rpcConnectionsCount;
    protected bool $stagenet;
    protected int $startTime;
    protected bool $synchronized;
    protected int $target;
    protected int $targetHeight;
    protected bool $testnet;
    protected string $topBlockHash;
    protected string $topHash;
    protected int $txCount;
    protected int $txPoolSize;
    protected bool $updateAvailable;
    protected string $version;
    protected bool $wasBootstrapEverUsed;
    protected int $whitePeerlistSize;
    protected string $wideCumulativeDifficulty;
    protected string $wideDifficulty;

    public function getAdjustedTime(): int
    {
        return $this->adjustedTime;
    }

    public function getAltBlocksCount(): int
    {
        return $this->altBlocksCount;
    }

    public function getBlockSizeLimit(): int
    {
        return $this->blockSizeLimit;
    }

    public function getBlockSizeMedian(): int
    {
        return $this->blockSizeMedian;
    }

    public function getBlockWeightLimit(): int
    {
        return $this->blockWeightLimit;
    }

    public function getBlockWeightMedian(): int
    {
        return $this->blockWeightMedian;
    }

    public function getBootstrapDaemonAddress(): string
    {
        return $this->bootstrapDaemonAddress;
    }

    public function getBusySyncing(): bool
    {
        return $this->busySyncing;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getCumulativeDifficulty(): int
    {
        return $this->cumulativeDifficulty;
    }

    public function getCumulativeDifficultyTop64(): int
    {
        return $this->cumulativeDifficultyTop64;
    }

    public function getDatabaseSize(): int
    {
        return $this->databaseSize;
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function getDifficultyTop64(): int
    {
        return $this->difficultyTop64;
    }

    public function getFreeSpace(): int
    {
        return $this->freeSpace;
    }

    public function getGreyPeerlistSize(): int
    {
        return $this->greyPeerlistSize;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getHeightWithoutBootstrap(): int
    {
        return $this->heightWithoutBootstrap;
    }

    public function getIncomingConnectionsCount(): int
    {
        return $this->incomingConnectionsCount;
    }

    public function getMainnet(): bool
    {
        return $this->mainnet;
    }

    public function getNettype(): string
    {
        return $this->nettype;
    }

    public function getOffline(): bool
    {
        return $this->offline;
    }

    public function getOutgoingConnectionsCount(): int
    {
        return $this->outgoingConnectionsCount;
    }

    public function getRestricted(): bool
    {
        return $this->restricted;
    }

    public function getRpcConnectionsCount(): int
    {
        return $this->rpcConnectionsCount;
    }

    public function getStagenet(): bool
    {
        return $this->stagenet;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function getSynchronized(): bool
    {
        return $this->synchronized;
    }

    public function getTarget(): int
    {
        return $this->target;
    }

    public function getTargetHeight(): int
    {
        return $this->targetHeight;
    }

    public function getTestnet(): bool
    {
        return $this->testnet;
    }

    public function getTopBlockHash(): string
    {
        return $this->topBlockHash;
    }

    public function getTopHash(): string
    {
        return $this->topHash;
    }

    public function getTxCount(): int
    {
        return $this->txCount;
    }

    public function getTxPoolSize(): int
    {
        return $this->txPoolSize;
    }

    public function getUpdateAvailable(): bool
    {
        return $this->updateAvailable;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getWasBootstrapEverUsed(): bool
    {
        return $this->wasBootstrapEverUsed;
    }

    public function getWhitePeerlistSize(): int
    {
        return $this->whitePeerlistSize;
    }

    public function getWideCumulativeDifficulty(): string
    {
        return $this->wideCumulativeDifficulty;
    }

    public function getWideDifficulty(): string
    {
        return $this->wideDifficulty;
    }

    public function setAdjustedTime(int $adjustedTime): void
    {
        $this->adjustedTime = $adjustedTime;
    }

    public function setAltBlocksCount(int $altBlocksCount): void
    {
        $this->altBlocksCount = $altBlocksCount;
    }

    public function setBlockSizeLimit(int $blockSizeLimit): void
    {
        $this->blockSizeLimit = $blockSizeLimit;
    }

    public function setBlockSizeMedian(int $blockSizeMedian): void
    {
        $this->blockSizeMedian = $blockSizeMedian;
    }

    public function setBlockWeightLimit(int $blockWeightLimit): void
    {
        $this->blockWeightLimit = $blockWeightLimit;
    }

    public function setBlockWeightMedian(int $blockWeightMedian): void
    {
        $this->blockWeightMedian = $blockWeightMedian;
    }

    public function setBootstrapDaemonAddress(string $bootstrapDaemonAddress): void
    {
        $this->bootstrapDaemonAddress = $bootstrapDaemonAddress;
    }

    public function setBusySyncing(bool $busySyncing): void
    {
        $this->busySyncing = $busySyncing;
    }

    public function setCredits(int $credits): void
    {
        $this->credits = $credits;
    }

    public function setCumulativeDifficulty(int $cumulativeDifficulty): void
    {
        $this->cumulativeDifficulty = $cumulativeDifficulty;
    }

    public function setCumulativeDifficultyTop64(int $cumulativeDifficultyTop64): void
    {
        $this->cumulativeDifficultyTop64 = $cumulativeDifficultyTop64;
    }

    public function setDatabaseSize(int $databaseSize): void
    {
        $this->databaseSize = $databaseSize;
    }

    public function setDifficulty(int $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function setDifficultyTop64(int $difficultyTop64): void
    {
        $this->difficultyTop64 = $difficultyTop64;
    }

    public function setFreeSpace(int $freeSpace): void
    {
        $this->freeSpace = $freeSpace;
    }

    public function setGreyPeerlistSize(int $greyPeerlistSize): void
    {
        $this->greyPeerlistSize = $greyPeerlistSize;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function setHeightWithoutBootstrap(int $heightWithoutBootstrap): void
    {
        $this->heightWithoutBootstrap = $heightWithoutBootstrap;
    }

    public function setIncomingConnectionsCount(int $incomingConnectionsCount): void
    {
        $this->incomingConnectionsCount = $incomingConnectionsCount;
    }

    public function setMainnet(bool $mainnet): void
    {
        $this->mainnet = $mainnet;
    }

    public function setNettype(string $nettype): void
    {
        $this->nettype = $nettype;
    }

    public function setOffline(bool $offline): void
    {
        $this->offline = $offline;
    }

    public function setOutgoingConnectionsCount(int $outgoingConnectionsCount): void
    {
        $this->outgoingConnectionsCount = $outgoingConnectionsCount;
    }

    public function setRestricted(bool $restricted): void
    {
        $this->restricted = $restricted;
    }

    public function setRpcConnectionsCount(int $rpcConnectionsCount): void
    {
        $this->rpcConnectionsCount = $rpcConnectionsCount;
    }

    public function setStagenet(bool $stagenet): void
    {
        $this->stagenet = $stagenet;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function setSynchronized(bool $synchronized): void
    {
        $this->synchronized = $synchronized;
    }

    public function setTarget(int $target): void
    {
        $this->target = $target;
    }

    public function setTargetHeight(int $targetHeight): void
    {
        $this->targetHeight = $targetHeight;
    }

    public function setTestnet(bool $testnet): void
    {
        $this->testnet = $testnet;
    }

    public function setTopBlockHash(string $topBlockHash): void
    {
        $this->topBlockHash = $topBlockHash;
    }

    public function setTopHash(string $topHash): void
    {
        $this->topHash = $topHash;
    }

    public function setTxCount(int $txCount): void
    {
        $this->txCount = $txCount;
    }

    public function setTxPoolSize(int $txPoolSize): void
    {
        $this->txPoolSize = $txPoolSize;
    }


    public function setUpdateAvailable(bool $updateAvailable): void
    {
        $this->updateAvailable = $updateAvailable;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function setWasBootstrapEverUsed(bool $wasBootstrapEverUsed): void
    {
        $this->wasBootstrapEverUsed = $wasBootstrapEverUsed;
    }

    public function setWhitePeerlistSize(int $whitePeerlistSize): void
    {
        $this->whitePeerlistSize = $whitePeerlistSize;
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
