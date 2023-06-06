<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface BlockHeaderBy extends Status
{
    public function getBlockHeader(): BlockHeader;

    public function getCredits(): int;

    public function getTopHash(): string;
}
