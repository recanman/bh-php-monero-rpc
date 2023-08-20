<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface BlockHeaderBy extends ResponseBase
{
    public function getBlockHeader(): BlockHeader;

    public function getCredits(): int;

    public function getTopHash(): string;
}
