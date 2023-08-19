<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface AltBlocksHashes extends ResponseBase
{
    public function getCredits(): int;
    public function getTopHash(): string;
}
