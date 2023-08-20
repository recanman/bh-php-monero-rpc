<?php

namespace BrianHenryIE\MoneroRpc\Model;

interface Block extends ResponseBase
{
    public function getBlob(): string;

    public function getBlockHeader(): BlockHeader;

    public function getCredits(): int;

    public function getJson(): string;

    public function getMinerTxHash(): string;

    public function getTopHash(): string;

    /**
     * @return string[]
     */
    public function getTxHashes(): array;
}
