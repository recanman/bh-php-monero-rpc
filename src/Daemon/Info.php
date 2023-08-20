<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface Info extends ResponseBase
{
    public function getAdjustedTime(): int;

    public function getAltBlocksCount(): int;

    public function getBlockSizeLimit(): int;

    public function getBlockSizeMedian(): int;

    public function getBlockWeightLimit(): int;

    public function getBlockWeightMedian(): int;

    public function getBootstrapDaemonAddress(): string;

    public function getBusySyncing(): bool;

    public function getCredits(): int;

    public function getCumulativeDifficulty(): int;

    public function getCumulativeDifficultyTop64(): int;

    public function getDatabaseSize(): int;

    public function getDifficulty(): int;

    public function getDifficultyTop64(): int;

    public function getFreeSpace(): int;

    public function getGreyPeerlistSize(): int;

    public function getHeight(): int;

    public function getHeightWithoutBootstrap(): int;

    public function getIncomingConnectionsCount(): int;

    public function getMainnet(): bool;

    public function getNettype(): string;

    public function getOffline(): bool;

    public function getOutgoingConnectionsCount(): int;

    public function getRestricted(): bool;

    public function getRpcConnectionsCount(): int;

    public function getStagenet(): bool;

    public function getStartTime(): int;

    public function getSynchronized(): bool;

    public function getTarget(): int;

    public function getTargetHeight(): int;

    public function getTestnet(): bool;

    public function getTopBlockHash(): string;

    public function getTopHash(): string;

    public function getTxCount(): int;

    public function getTxPoolSize(): int;

    public function getUpdateAvailable(): bool;

    public function getVersion(): string;

    public function getWasBootstrapEverUsed(): bool;

    public function getWhitePeerlistSize(): int;

    public function getWideCumulativeDifficulty(): string;

    public function getWideDifficulty(): string;
}
