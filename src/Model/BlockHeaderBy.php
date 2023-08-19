<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface BlockHeaderBy extends ResponseBase
{
    public function getBlockHeader(): BlockHeader;

    public function getCredits(): int;

    public function getTopHash(): string;
}
