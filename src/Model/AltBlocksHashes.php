<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface AltBlocksHashes extends Status
{
    public function getCredits(): int;
    public function getTopHash(): string;
}
