<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface AltBlocksHashes extends ResponseBase
{
    public function getCredits(): int;
    public function getTopHash(): string;
}
