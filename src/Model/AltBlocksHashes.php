<?php

namespace BrianHenryIE\MoneroRpc\Model;

interface AltBlocksHashes extends ResponseBase
{
    public function getCredits(): int;
    public function getTopHash(): string;
}
