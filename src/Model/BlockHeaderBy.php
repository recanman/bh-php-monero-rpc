<?php

namespace BrianHenryIE\MoneroRpc\Model;

interface BlockHeaderBy extends ResponseBase
{
    public function getBlockHeader(): BlockHeader;

    public function getCredits(): int;

    public function getTopHash(): string;
}
